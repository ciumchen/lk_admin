<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\IntegralLog;
use App\Admin\Repositories\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class IntegralLogController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new IntegralLog(), function (Grid $grid) {
            $grid->model()->orderBy('id','desc');
            $grid->model()->with(['user']);
            $grid->column('id')->sortable();
            $grid->column('uid');
            $grid->column('role')->display(function ($v){
                return User::$roleLabel[$v] ?? $v;
            });
            $grid->column('consumer_uid');
            $grid->column('user.phone',"用户手机号");
            $grid->column('order_no','订单号');

            $grid->column('amount');
            $grid->column('amount_before_change');
            $grid->column('description','订单类型')->display(function ($v){
                if($v=='HF'){
                    return '话费';
                }elseif($v=='YK'){
                    return '油卡';
                }elseif($v=='MT'){
                    return '美团';
                }elseif($v=='ZL'){
                    return '代充';
                }elseif($v=='LR'){
                    return '录单';
                }elseif($v=='VC'){
                    return '视频会员';
                }elseif($v=='AT'){
                    return '飞机票';
                }elseif($v=='UB'){
                    return '生活缴费';
                }elseif($v=='CLP'){
                    return '兑换额度(话费)';
                }elseif($v=='CLM'){
                    return '兑换额度(美团)';
                }else{
                    return "未知类型";
                }


                return User::$roleLabel[$v] ?? $v;
            });
            $grid->column('operate_type')->display(function ($v){
                return \App\Models\IntegralLog::$operateTypeTexts[$v] ?? $v;
            });
//            $grid->column('ip');
//            $grid->column('user_agent');
            $grid->column('remark');
//            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->disableCreateButton();
            $grid->disableActions();
            $grid->disableBatchDelete();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('uid');
                $filter->equal('consumer_uid');
                $filter->equal('user.phone','用户手机号');
                $filter->equal('order_no','订单号');
                $filter->equal('role','用户身份')->select(function () {
                    return IntegralLog::$operateTypeTexts;
                });

            });
        });
    }
}
