<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\BmRechargeOrder;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use App\Models\BmRechargeOrder as BmModel;

class BmRechargeOrderController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $_this = $this;
        return Grid::make(new BmRechargeOrder(), function (Grid $grid) use ($_this)
        {
            $grid->model()->orderByDesc('orderTimeFull');
            $grid->column('billId');
            $grid->column('rechargeAccount');
//            $grid->column('classType');
            $grid->column('facePrice');
            $grid->column('saleAmount');
            $grid->column('orderCost');
//            $grid->column('itemCost');
            $grid->column('itemName');
            $grid->column('itemNum');
//            $grid->column('operateTime');
//            $grid->column('orderProfit');
//            $grid->column('orderTime');
            $grid->column('orderTimeFull');
            $grid->column('payState')->using(BmModel::$payStateText)->label(BmModel::$payStateStyle);
            $grid->column('rechargeState')->using(BmModel::$rechargeStateText)->label(BmModel::$rechargeStateStyle);
            $grid->column('revokeMessage')->limit(20);
            $grid->column('supUserId');
            $grid->filter(function (Grid\Filter $filter)
            {
                $filter->equal('billId');
                $filter->equal('rechargeAccount');
                $filter->equal('rechargeState')->select(BmModel::$rechargeStateText);
                $filter->between('orderTimeFull')->date();
            });
            $_this->disableButton($grid);
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
    
    /**
     * Description:禁用操作按钮
     *
     * @param  \Dcat\Admin\Grid  $grid
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/18 0018
     */
    public function disableButton(Grid $grid)
    {
        $grid->disableActions();
        // 禁用创建按钮
        $grid->disableCreateButton();
        // 禁用编辑按钮
        $grid->disableEditButton();
        // 禁用删除按钮
        $grid->disableDeleteButton();
        // 禁用显示按钮
        $grid->disableViewButton();
        $grid->disableBatchDelete();
    }
}
