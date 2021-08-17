<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\Tools\BmOrderGetList;
use App\Admin\Repositories\BmRechargeOrder;
use App\Services\BmApi\BmOrderService;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class BmRechargeOrderController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
//        $res = (new BmOrderService)->getOrderLists('2021-08-16');
//        dd($res);
        return Grid::make(new BmRechargeOrder(), function (Grid $grid)
        {
            $grid->column('id')->sortable();
            $grid->column('billId');
            $grid->column('classType');
            $grid->column('facePrice');
            $grid->column('itemCost');
            $grid->column('itemName');
            $grid->column('itemNum');
            $grid->column('operateTime');
            $grid->column('orderCost');
            $grid->column('orderProfit');
            $grid->column('orderTime');
            $grid->column('orderTimeFull');
            $grid->column('payState');
            $grid->column('rechargeAccount');
            $grid->column('rechargeState');
            $grid->column('revokeMessage');
            $grid->column('saleAmount');
            $grid->column('supUserId');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
            $grid->filter(function (Grid\Filter $filter)
            {
                $filter->equal('id');
            });
        });
    }
    
    /**
     * Make a show builder.
     *
     * @param  mixed  $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new BmRechargeOrder(), function (Show $show)
        {
            $show->field('id');
            $show->field('billId');
            $show->field('classType');
            $show->field('facePrice');
            $show->field('itemCost');
            $show->field('itemName');
            $show->field('itemNum');
            $show->field('operateTime');
            $show->field('orderCost');
            $show->field('orderProfit');
            $show->field('orderTime');
            $show->field('orderTimeFull');
            $show->field('payState');
            $show->field('rechargeAccount');
            $show->field('rechargeState');
            $show->field('revokeMessage');
            $show->field('saleAmount');
            $show->field('supUserId');
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
        return Form::make(new BmRechargeOrder(), function (Form $form)
        {
            $form->display('id');
            $form->text('billId');
            $form->text('classType');
            $form->text('facePrice');
            $form->text('itemCost');
            $form->text('itemName');
            $form->text('itemNum');
            $form->text('operateTime');
            $form->text('orderCost');
            $form->text('orderProfit');
            $form->text('orderTime');
            $form->text('orderTimeFull');
            $form->text('payState');
            $form->text('rechargeAccount');
            $form->text('rechargeState');
            $form->text('revokeMessage');
            $form->text('saleAmount');
            $form->text('supUserId');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
