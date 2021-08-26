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
            $grid->model()->where('create_type','!=',3);
            $grid->model()->with(['orders','tradeOrder'])->orderByDesc('order_id');

            $grid->column('order_id')->sortable();
            $grid->column('order_no');
            $grid->column('money');
            $grid->column('orders.profit_ratio', '商家让利')->display(function () {
                return ($this->orders[ 'profit_ratio' ] ?? '').'%';
            });
            $grid->column('uid');
            $grid->column('mobile');
            $grid->column('tradeOrder.order_from','订单来源')->display(function($v){
                if($v=='alipay'){
                    return '支付宝支付';
                }elseif($v=='wx'){
                    return '微信支付';
                }elseif($v=='gwk'){
                    return '购物卡';
                }else{
                    return "其他支付";
                }
            });//订单来源
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
                $filter->equal('orders.pay_status', '支付状态')->select(function () {
                    return Order::$pay_status;
                });

            });
            $thisController->disableButtons($grid);

            $grid->actions(function (Grid\Displayers\Actions $actions) {
                $actions->append(new MobileAgent());
            });


            $titles = [
                'order_id' => '录单ID',
                'order_no' => '订单号',
                'money' => '充值金额',
                'orders.profit_ratio' => '商家让利',
                'uid' => '消费者UID',
                'mobile' => '充值手机号',
                'tradeOrder.order_from' => '订单来源',
                'orders.pay_status' => '支付状态',
                'status' => '充值状态',
                'created_at' => '创建时间',
                'updated_at' => '更新时间',

            ];
            $grid->export($titles)->rows(function (array $rows) {
                foreach ($rows as $index => &$row) {
                    // 这里假设role就是关联数据
                    $row['orders.profit_ratio'] = $row['orders']['profit_ratio'];
//                    $row['user.phone'] = $row['numeric'];
                    if($row['status']==0){
                        $row['status']="充值中";
                    }elseif($row['status']==1){
                        $row['status']="成功";
                    }elseif($row['status']==9){
                        $row['status']="撤销";
                    }else{
                        $row['status']="充值异常";
                    }

                    if($row['orders']['pay_status']=='await'){
                        $row['orders.pay_status']="待支付";
                    }elseif($row['orders']['pay_status']=='pending'){
                        $row['orders.pay_status']="支付处理中";
                    }elseif($row['orders']['pay_status']=='succeeded'){
                        $row['orders.pay_status']="支付成功";
                    }elseif($row['orders']['pay_status']=='failed'){
                        $row['orders.pay_status']="支付失败";
                    }else{
                        $row['orders.pay_status']="订单异常";
                    }//支付状态

                    if($row['trade_order']['order_from']=='alipay'){
                        $row['tradeOrder.order_from']="支付宝支付";
                    }elseif($row['trade_order']['order_from']=='wx'){
                        $row['tradeOrder.order_from']="微信支付";
                    }elseif($row['trade_order']['order_from']=='gwk'){
                        $row['tradeOrder.order_from']="购物卡";
                    }else{
                        $row['tradeOrder.order_from']="其他支付";
                    }//订单来源

                }
                return $rows;
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
