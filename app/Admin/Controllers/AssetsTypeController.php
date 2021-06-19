<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\AssetsType;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class AssetsTypeController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new AssetsType(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('contract_address');
            $grid->column('assets_name');
            $grid->column('recharge_status')->display(function ($v){
                return AssetsType::$rechargeLabel[$v];
            });
            $grid->column('can_withdraw')->display(function ($v){
                return AssetsType::$withdrawLabel[$v];
            });
            $grid->column('withdraw_fee');
            $grid->column('large_withdraw_amount');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
            $grid->disableBatchDelete();
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new AssetsType(), function (Show $show) {
            $show->field('id');
            $show->field('contract_address');
            $show->field('assets_name');
            $show->field('recharge_status');
            $show->field('can_withdraw');
            $show->field('withdraw_fee');
            $show->field('large_withdraw_amount');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new AssetsType(), function (Form $form) {
            $form->display('id');
            $form->text('contract_address');
            $form->text('assets_name');
            $form->radio('recharge_status')->options(AssetsType::$rechargeLabel)->default(AssetsType::CAN_RECHARGE)->required();;
            $form->radio('can_withdraw')->options(AssetsType::$withdrawLabel)->default(AssetsType::CAN_WITHDRAW)->required();;
            $form->number('withdraw_fee');
            $form->number('large_withdraw_amount');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
