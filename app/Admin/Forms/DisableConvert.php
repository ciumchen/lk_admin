<?php

namespace App\Admin\Forms;

use App\Models\ConvertLogs;
use Dcat\Admin\Contracts\LazyRenderable;
use Dcat\Admin\Widgets\Form;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Dcat\Admin\Traits\LazyWidget;

class DisableConvert extends Form implements LazyRenderable
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

        $convertLogs = ConvertLogs::find($id);

        try {
            DB::transaction(function () use ($convertLogs) {
                $convertLogs->status = 2;
                $convertLogs->save();
            });
        } catch (\Exception $e) {
            return $this->error($e->getMessage());
        }

        return $this->success('成功', '');
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->display('id', 'ID')->default($this->payload['id']);
        $this->display('phone', '用户')->default($this->payload['phone']);
        $this->display('user_name', '姓名')->default($this->payload['user_name']);
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
