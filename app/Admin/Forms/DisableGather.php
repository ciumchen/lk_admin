<?php

namespace App\Admin\Forms;

use App\Models\Gather;
use App\Models\GatherGoldLogs;
use App\Models\GatherUsers;
use Dcat\Admin\Contracts\LazyRenderable;
use Dcat\Admin\Widgets\Form;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Dcat\Admin\Traits\LazyWidget;

class DisableGather extends Form implements LazyRenderable
{
    use LazyWidget; // 使用异步加载功能
    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return Response
     */
    public function handle(array $input)
    {
        $id = $this->payload['id'] ?? null;
        if(!$id){
            return $this->error('ID错误');
        }

        $data = [
            'id'   => $id,
            'date' => date('Y-m-d H:i:s')
        ];
        try {
            DB::transaction(function () use ($data) {
                $status = 3;
                //更新拼团状态
                Gather::where(['id' => $data['id']])
                    ->update(['status' => $status, 'updated_at' => $data['date']]);

                //修改来拼金扣除状态
                GatherGoldLogs::where(['gid' => $data['id']])
                    ->update(['status' => $status, 'type' => 0, 'updated_at' => $data['date']]);

                //更新用户参团状态
                GatherUsers::where(['gid' => $data['id']])
                    ->update(['status' => 0, 'updated_at' => $data['date']]);
            });
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success('更新成功', '');
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->display('id', '拼团ID')->default($this->payload['id']);
        $this->display('status', '拼团状态')->default($this->payload['status']);
    }

    /**
     * The data of the form.
     *
     * @return array
     */
    public function default()
    {
    }
}
