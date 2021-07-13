<?php

namespace App\Admin\Forms;


use App\Admin\Repositories\BusinessApply;
use App\Models\AppealLog;
use App\Models\Asset;
use App\Models\AssetsLog;
use App\Models\AssetsType;
use App\Models\BusinessData;
use App\Models\FreezeLog;
use App\Models\Order;
use App\Models\Setting;
use App\Models\User;
use App\Services\AssetsService;
use Dcat\Admin\Contracts\LazyRenderable;
use Dcat\Admin\Widgets\Form;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Dcat\Admin\Traits\LazyWidget;
use exception;
class ReviewBusinessApply extends Form implements LazyRenderable
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
        $form['remark'] = $input['msg']??'';
        $form['process'] = $input['process'];

        try {
            DB::transaction(function () use ($id, $form) {
                $businessApply = \App\Models\BusinessApply::where('status', 1)->lockForUpdate()->find($id);
                if(!$businessApply)
                    throw new exception('申请已审核,无需再次操作');

                $user = User::whereId($businessApply->uid)->lockForUpdate()->first();
                //如果通过申请
                if($form['process'] == 1){

                    $businessApply->status = 2;
                    $user->role = 2;
                    $user->save();
//                    $this->createBusiness($businessApply);
                    $businessDataInfo = (new BusinessData())->where('business_apply_id',$id)->first();
                    if ($businessDataInfo){
                        $businessDataInfo->is_status = 2;
                        $businessDataInfo->save();
                    }

                //如果拒绝申请
                }elseif($form['process'] == 2){
                    $businessApply->status = 3;
                }
                $businessApply->remark = $form['remark'];
                $businessApply->save();


            });
        } catch (\Exception $e) {

            return $this->error($e->getMessage());
        }

        return $this->location(null, '申请成功');
    }

    /**
     * Build a form here.
     */
    public function form()
    {

        $this->display('id', '申请ID')->default($this->payload['id']);
        $this->display('uid', '申请人UID')->default($this->payload['uid']);
        $this->display('status', '状态')->default(\App\Admin\Repositories\BusinessApply::$statusLabel[$this->payload['status']]);


        $this->radio('process', '处理')
            ->options([
                1 => '通过',
                2 => '拒绝',
            ]);

        $this->text('msg', '审核回复');

    }

    /**
     * The data of the form.
     *
     * @return array
     */
    public function default()
    {
        return [
            'remark'  => '',
            'process'  => 1,
        ];
    }

    /**创建商家数据
     * @param $businessApply
     */
    public function createBusiness($businessApply){


        $businessData = new BusinessData();
        $businessData->uid = $businessApply->uid ;
        $businessData->contact_number = $businessApply->phone;
        $businessData->main_business = $businessApply->phone;
        $businessData->address = $businessApply->address;
        $businessData->name = $businessApply->name;
        $businessData->status = 2;
        $businessData->category_id = 0;
        $businessData->business_apply_id = $businessApply->id;
        $businessData->save();
    }


}
