<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\UserShoppingCardDhLog;
use App\Models\GatherShoppingCard;
use App\Models\UserLpjLog as UserLpjLogModel;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class UserShoppingCardDhLogController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new GatherShoppingCard(), function (Grid $grid) {
            $grid->model()->with(['gwkDhLog']);
            $grid->model()->orderBy('id','desc');
            $grid->column('id')->sortable();
            $grid->column('uid');
//            $grid->column('gwkDhLog.gather_shopping_card_id');
            $grid->column('gwkDhLog.operate_type');
//            $grid->column('gwkDhLog.operate_type','操作类型')->display(function ($v) {
//                if ($v=='exchange_zl'){
//                    return "代充";
//                } elseif ($v=='exchange_pl') {
//                    return "批量代充";
//                }elseif ($v=='exchange_mt') {
//                    return "美团";
//                }elseif ($v=='exchange_hf') {
//                    return "直充";
//                }elseif ($v=='exchange_lr') {
//                    return "录单";
//                }else{
//                    return "拼团中奖";
//                }
//            });
            $grid->column('name');
            $grid->column('money');
//            $grid->column('gwkDhLog.money_before_change','变动前购物卡余额');
            $grid->column('gwkDhLog.order_no','订单号');
            $grid->column('gwkDhLog.status','兑换状态')->using(UserLpjLogModel::$statusLabel)->label(UserLpjLogModel::$statusLabelStyle);
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->disableCreateButton();
            $grid->disableActions();
            $grid->disableBatchDelete();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('uid');
                $filter->equal('operate_type')->select(function () {
                    return UserLpjLogModel::$operateTypeTexts;
                });

                $filter->equal('order_no');
                $filter->equal('status')->select(function () {
                    return UserLpjLogModel::$operateStatus;
                });

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
//    protected function detail($id)
//    {
//        return Show::make($id, new UserLpjLog(), function (Show $show) {
//            $show->field('id');
//            $show->field('created_at');
//            $show->field('updated_at');
//        });
//    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
//    protected function form()
//    {
//        return Form::make(new UserLpjLog(), function (Form $form) {
//            $form->display('id');
//
//            $form->display('created_at');
//            $form->display('updated_at');
//        });
//    }
}
