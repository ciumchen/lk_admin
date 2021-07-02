<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\LkPhoneBillOrder;
use App\Admin\Repositories\LkShopMerchantOrder;
use App\Admin\Repositories\Order;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use App\Models\LkShopMerchantOrder as McOrderModer;
class LkShopSelfSupportOrderController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new LkShopMerchantOrder(), function (Grid $grid) {
            $grid->model()->where('description','=',"1688_order");
            $grid->model()->with(['order']);
            $grid->model()->orderBy('id','desc');

            $grid->column('order.id')->sortable();
            $grid->column('uid');
            $grid->column('business_uid');
            $grid->column('order_no');//订单号
            $grid->column('profit_ratio')->display(function () {
                return (floatval($this->profit_ratio)).'%';
            });//让利比例
            $grid->column('price');
            $grid->column('profit_price');
            $grid->column('name');

            $grid->column('status')->using(Order::$statusLabel)->label(Order::$statusLabelStyle);
            $grid->column('order.pay_status','支付状态')->using(Order::$pay_status)->label(Order::$payStatusLabelStyle);

//            $grid->column('订单来源')->display(function($v){
//                return '来客优选商户订单';
//            });//订单来源
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            // 禁用删除按钮
            $grid->disableDeleteButton();
            //禁用新增按钮
            $grid->disableCreateButton();
            //禁用显示按钮
            $grid->disableViewButton();
            //禁用编辑按钮
            $grid->disableEditButton();
            $grid->disableBatchDelete();
            $grid->disableActions();
            $titles = [
                'order.id' => 'ID',
                'uid' => '消费者ID',
                'business_uid' => '商户ID',
                'order_no' => '订单号',
                'profit_ratio' => '让利比列(%)',
                'price' => '消费金额',
                'profit_price' => '实际让利金额',
                'status' => '审核状态',
                'order.pay_status' => '支付状态',
                'created_at' => '创建时间',
                'updated_at' => '确认收货时间',
            ];
            $grid->export($titles)->rows(function (array $rows) {
                foreach ($rows as $index => &$row) {
                    // 这里假设role就是关联数据
                    $row['order.id'] = $row['order']['id'];
                    $row['order.pay_status'] = $row['order']['pay_status'];
                    if($row['status']==1){
                        $row['status']="审核中";
                    }elseif($row['status']==2){
                        $row['status']="审核通过";
                    }elseif($row['status']==3){
                        $row['status']="审核失败";
                    }else{
                        $row['status']="订单异常";
                    }

                    if($row['order.pay_status']=='await'){
                        $row['order.pay_status']="待支付";
                    }elseif($row['order.pay_status']=='pending'){
                        $row['order.pay_status']="支付处理中";
                    }elseif($row['order.pay_status']=='succeeded'){
                        $row['order.pay_status']="支付成功";
                    }elseif($row['order.pay_status']=='failed'){
                        $row['order.pay_status']="支付失败";
                    }else{
                        $row['order.pay_status']="订单异常";
                    }
                }
                return $rows;
            });

            //筛选
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('order.id');
                $filter->equal('uid','消费UID');
                $filter->equal('business_uid','商户UID');
                $filter->equal('order_no');
                //审核状态
                $filter->equal('status')->select(function () {
                    return McOrderModer::$statusLabel_shop;
                });
                //支付状态
                $filter->equal('order.pay_status','支付状态')->select(function () {
                    return Order::$pay_status;
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
//        return Show::make($id, new LkPhoneBillOrder(), function (Show $show) {
//            $show->field('id');
//            $show->field('shop_id');
//            $show->field('user_id');
//            $show->field('goods_id');
//            $show->field('created_at');
//            $show->field('updated_at');
//        });
//    }

    /**
     * Make a form builder.
     *编辑订单
     * @return Form
     */
//    protected function form()
//    {
//        return Form::make(new LkPhoneBillOrder(), function (Form $form) {
////            $form->display('id');
////            $form->display('shop_id');
////            $form->display('user_id');
////            $form->display('order_no');
//            $form->text('status');
//
//        });
//    }
}
