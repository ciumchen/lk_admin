<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\VerifyOrder;
use App\Admin\Repositories\Order;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\Admin;

class OrderController extends AdminController
{

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Order(), function (Grid $grid) {
            $grid->model()->orderBy('id', 'desc');
            $grid->model()->with(['user', 'business', 'select_trade_order','order_video']);
            $grid->column('id')->sortable();
            $grid->column('uid');
            $grid->column('business_uid');
            $grid->column('order_no', '订单号')->display(function ($no) {
                if (!empty($no)) {
                    return $no;
                } else {
                    return $this->select_trade_order[ 'order_no' ] ?? '';
                }
            });
            $grid->column('business.phone', "商家手机号");
            $grid->column('select_trade_order.numeric', '录入消费者手机号');
            $grid->column('profit_ratio');
            $grid->column('price');
            $grid->column('profit_price');
            $grid->column('status')->using(Order::$statusLabel)->label(Order::$statusLabelStyle);
            $grid->column('pay_status')->using(Order::$pay_status)->label(Order::$payStatusLabelStyle);
            $grid->column('name');
//            $grid->column('remark');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
            // 禁用创建按钮
            $grid->disableCreateButton();
            // 禁用编辑按钮
            $grid->disableEditButton();
            // 禁用删除按钮
            $grid->disableDeleteButton();
            // 禁用显示按钮
            $grid->disableViewButton();
            $grid->disableBatchDelete();
            $grid->perPages([20, 50, 100, 200, 500]);
            //筛选
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('uid');
                $filter->equal('business_uid');
                $filter->equal('select_trade_order.order_no', '订单号');
                $filter->equal('order_video.order_no', '视频卡订单号');
                $filter->equal('select_trade_order.numeric', '录入消费者手机号');
                $filter->equal('profit_price');
                $filter->equal('name')->select(function () {
                    return Order::$ld_order_select;
                });
                $filter->equal('status')->select(function () {
                    return Order::$statusLabel;
                });
                //支付状态
                $filter->equal('pay_status')->select(function () {
                    return Order::$pay_status;
                });
                $filter->between('updated_at')->datetime();
            });
            //审核订单按钮
            $grid->actions(function (Grid\Displayers\Actions $actions) {
                if (Admin::user()->id == 1 || Admin::user()->id == 2) {
                    $actions->append(new VerifyOrder());
                } elseif ($actions->row->pay_status == 'succeeded' && $actions->row->status == Order::STATUS_DEFAULT) {
                    $actions->append(new VerifyOrder());
                }
            });
            $titles = [
                'id'                          => 'ID',
                'uid'                         => '消费者UID',
                'business_uid'                => '	商家UID',
                'select_trade_order.order_no' => '订单号',
                'business.phone'              => '商家手机号',
                'profit_ratio'                => '让利比列(%)',
                'select_trade_order.numeric'  => '录入消费者手机号',
                'price'                       => '消费金额',
                'profit_price'                => '实际让利金额',
                'status'                      => '审核状态',
                'pay_status'                  => '	支付状态',
                'name'                        => '消费商品名',
                'remark'                      => '备注',
                'created_at'                  => '创建时间',
                'updated_at'                  => '更新时间',
            ];
            $grid->export($titles)->rows(function (array $rows) {
                foreach ($rows as $index => &$row) {
                    // 这里假设role就是关联数据
                    $row[ 'user.phone' ] = $row[ 'user' ][ 'phone' ];
                    $row[ 'business.phone' ] = $row[ 'business' ][ 'phone' ];
                    $row[ 'select_trade_order.order_no' ] = $row[ 'select_trade_order' ][ 'order_no' ];
                    $row[ 'select_trade_order.numeric' ] = $row[ 'select_trade_order' ][ 'numeric' ];
                    if ($row[ 'status' ] == 1) {
                        $row[ 'status' ] = "审核中";
                    } elseif ($row[ 'status' ] == 2) {
                        $row[ 'status' ] = "审核通过";
                    } elseif ($row[ 'status' ] == 3) {
                        $row[ 'status' ] = "审核失败";
                    }
                    //支付状态
                    if ($row[ 'pay_status' ] == 'await') {
                        $row[ 'pay_status' ] = "待支付";
                    } elseif ($row[ 'pay_status' ] == 'pending') {
                        $row[ 'pay_status' ] = "支付处理中";
                    } elseif ($row[ 'pay_status' ] == 'succeeded') {
                        $row[ 'pay_status' ] = "支付成功";
                    } elseif ($row[ 'pay_status' ] == 'failed') {
                        $row[ 'pay_status' ] = "支付失败";
                    } else {
                        $row[ 'pay_status' ] = "订单异常";
                    }
                }
                return $rows;
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
        return Show::make($id, new Order(), function (Show $show) {
            $show->field('id');
            $show->field('uid');
            $show->field('business_uid');
            $show->field('profit_ratio');
            $show->field('price');
            $show->field('profit_price');
            $show->field('status');
            $show->field('name');
            $show->field('remark');
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
        return Form::make(new Order(), function (Form $form) {
            $form->display('id');
            $form->text('uid');
            $form->text('business_uid');
            $form->text('profit_ratio');
            $form->text('price');
            $form->text('profit_price');
            $form->text('status');
            $form->text('name');
            $form->text('remark');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
