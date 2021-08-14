<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\UserLpjLog;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use App\Models\UserLpjLog as UserLpjLogModel;
class UserLpjLogController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new UserLpjLog(), function (Grid $grid) {
            $grid->model()->orderBy('id','desc');
            $grid->column('id')->sortable();
            $grid->column('uid');
            $grid->column('operate_type')->display(function ($v) {
                if ($v=='recharge'){
                    return "充值";
                } elseif ($v=='withdrawal') {
                    return "提现";
                }elseif ($v=='consumption') {
                    return "消费";
                }else{
                    return "未知操作";
                }
            });
            $grid->column('money');
            $grid->column('money_before_change');
            $grid->column('order_no');
            $grid->column('status')->using(UserLpjLogModel::$statusLabel)->label(UserLpjLogModel::$statusLabelStyle);
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
