<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Order;
use App\Admin\Repositories\ToBeAddedIntegral;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use Illuminate\Support\Facades\DB;

class ToBeAddedIntegralController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new ToBeAddedIntegral(), function (Grid $grid) {
            $grid->header(function ($collection) {
                $today = strtotime(date('Y-m-d',time()));
                $orderIntegralData = DB::table('order_integral_lk_distribution')->where('day',$today)->first();
                $count_price = \App\Models\Order::where('status',2)->where('line_up',1)->sum('price');
                $count_profit_price = \App\Models\Order::where('status',2)->where('line_up',1)->sum('profit_price');
                $buttoncss = 'background: #5c6bc6;font-size: 120%;font-weight: 600;color: #fff;margin-bottom: 4px;display: inline;
padding: .24em .6em .34em;line-height: 1;text-align: center;white-space: nowrap;vertical-align: baseline;border-radius: .25em;cursor: pointer;box-sizing: border-box;';

                return "<div style='margin: 10px;text-align: center'>
                        <span style='$buttoncss'>今日导入排队订单消费者LK分配统计：".$orderIntegralData->count_lk."个</span>&nbsp;&nbsp;&nbsp;
                        <span style='$buttoncss'>今日导入排队订单实际让利金额统计：".$orderIntegralData->count_profit_price."元</span>&nbsp;&nbsp;&nbsp;
                        <span style='$buttoncss'>剩余排队订单消费金额统计：".$count_price."元</span>&nbsp;&nbsp;&nbsp;
                        <span style='$buttoncss'>剩余排队订单实际让利金额统计：".$count_profit_price."元</span>
                        </div>";

            });

            $grid->model()->where('line_up',1);
            $grid->model()->orderBy('id','asc');
            $grid->model()->with(['user','business','select_trade_order']);

            $grid->column('id')->sortable();
            $grid->column('uid');

            $grid->column('business_uid');

            $grid->column('select_trade_order.order_no','订单号');

//            $grid->column('business.phone',"商家手机号");
//            $grid->column('select_trade_order.numeric','录入消费者手机号');
            $grid->column('profit_ratio');
            $grid->column('price');
            $grid->column('profit_price');
            $grid->column('line_up','积分状态')->using([0 => '已添加', 1 => '排队中'])->label([
                1 => 'primary',
                0 => 'success',
                2 => Admin::color()->info()
            ]);

            $grid->column('status')->using([1 => '审核中', 2 => '审核通过',3=>'审核不通过'])->label([
                1 => 'primary',
                2 => 'success',
                3 => 'danger',
                4 => Admin::color()->info()
            ]);

            $grid->column('pay_status')->using(['await' => '待支付', 'pending' => '支付处理中','succeeded'=>'支付成功','failed'=>'支付失败','ddyc'=>"订单异常"])->label([
                'await' => 'primary',
                'pending' => 'orange',
                'succeeded' => 'success',
                'failed' => 'danger',
                'ddyc' => 'dark',
                4 => Admin::color()->info()
            ]);



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
                $filter->equal('select_trade_order.order_no','订单号');
                $filter->equal('select_trade_order.numeric','录入消费者手机号');
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
        return Show::make($id, new ToBeAddedIntegral(), function (Show $show) {
            $show->field('id');
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
        return Form::make(new ToBeAddedIntegral(), function (Form $form) {
            $form->display('id');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
