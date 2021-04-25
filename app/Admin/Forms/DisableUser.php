<?php

namespace App\Admin\Forms;


use App\Models\BanList;
use App\Models\User;
use Dcat\Admin\Admin;
use Dcat\Admin\Contracts\LazyRenderable;
use Dcat\Admin\Widgets\Form;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Dcat\Admin\Traits\LazyWidget;
use exception;
class DisableUser extends Form implements LazyRenderable
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
            return $this->error('用户ID错误');
        }

        $user = User::find($id);

        $remark = $input['remark'];


        try {
            DB::transaction(function () use ($user,$remark) {
                $banlist = BanList::updateOrCreate([
                    'uid' => $user->id,
                    'reason' => $remark,
                    'ip' => '',
                ]);

                $user->update([
                    'status' => 2,
                    'ban_reason' => $banlist->reason,
                ]);
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
        $this->text('remark', '封禁原因')->required();
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
