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
            $grid->column('user.phone',"用户手机号");
            $grid->column('order_no','订单号');

            $grid->column('operate_type')->display(function ($v){
                return \App\Models\IntegralLog::$operateTypeTexts[$v] ?? $v;
            });
            $grid->column('amount');
            $grid->column('amount_before_change');
            $grid->column('role')->display(function ($v){
                return User::$roleLabel[$v] ?? $v;
            });
            $grid->column('ip');
            $grid->column('user_agent');
            $grid->column('remark');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->disableCreateButton();
            $grid->disableActions();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('uid');
                $filter->equal('user.phone','用户手机号');
                $filter->equal('order_no','订单号');
                $filter->equal('role','用户身份')->select(function () {
                    return IntegralLog::$operateTypeTexts;
                });

            });
        });
    }
}
