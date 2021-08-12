<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\MobileAgent;
use App\Admin\Actions\Grid\VerifyOrder;
use App\Admin\Repositories\Order;
use App\Admin\Repositories\OrderMobile;
use App\Models\OrderMobileRecharge;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class MobileAgentController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $thisController = $this;
        return Grid::make(new OrderMobile(), function (Grid $grid) use ($thisController) {
            $grid->model()->with(['orders'])->orderByDesc('order_id');
            $grid->column('order_id')->sortable();
            $grid->column('order_id');
            $grid->column('order_no');
            $grid->column('money');
            $grid->column('orders.profit_ratio', '商家让利')->display(function () {
                return ($this->orders[ 'profit_ratio' ] ?? '').'%';
            });
            $grid->column('uid');
            $grid->column('mobile');
//            $grid->column('trade_no');
            $grid->column('orders.pay_status', '支付状态')
                 ->using(Order::$pay_status)
                 ->label(Order::$payStatusLabelStyle);
//            $grid->column('goods_title');
            $grid->column('status')
                 ->using(OrderMobileRecharge::$statusText)
                 ->label(OrderMobileRecharge::$statusLabelStyle);
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('order_id');
                $filter->equal('uid');
                $filter->equal('mobile');
                $filter->equal('order_no');
                $filter->equal('orders.pay_status', '支付状态');

            });
            $thisController->disableButtons($grid);

            $grid->actions(function (Grid\Displayers\Actions $actions) {
                $actions->append(new MobileAgent());
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
    protected function detail($id)
    {
        return Show::make($id, new OrderMobile(), function (Show $show) {
            $show->field('id');
            $show->field('order_no');
            $show->field('mobile');
            $show->field('order_id');
            $show->field('money');
            $show->field('trade_no');
            $show->field('status');
            $show->field('pay_status');
            $show->field('goods_title');
            $show->field('uid');
            $show->field('create_type');
            $show->field('num');
            $show->field('has_child');
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
        return Form::make(new OrderMobile(), function (Form $form) {
            $form->display('id');
            $form->text('order_no');
            $form->text('mobile');
            $form->text('order_id');
            $form->text('money');
            $form->text('trade_no');
            $form->text('status');
            $form->text('pay_status');
            $form->text('goods_title');
            $form->text('uid');
            $form->text('create_type');
            $form->text('num');
            $form->text('has_child');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }

    /**
     * Description:
     *
     * @param \Dcat\Admin\Grid $grid
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/7/29 0029
     */
    public function disableButtons(Grid $grid)
    {
        // 禁用删除按钮
        $grid->disableDeleteButton();
        //禁用新增按钮
        $grid->disableCreateButton();
        //禁用显示按钮
        $grid->disableViewButton();
        //禁用编辑按钮
        $grid->disableEditButton();
        $grid->disableBatchDelete();
    }
}
