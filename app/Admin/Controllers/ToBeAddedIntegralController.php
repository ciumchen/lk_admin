<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Order;
use App\Admin\Repositories\ToBeAddedIntegral;
use App\Models\OrderIntegralLkDistribution;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\Order as OrderModel;

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
                $data = array(
                    'count_lk'=>Users::sum('lk'),
                    'count_profit_price'=>0,
                );
                $today = strtotime(date('Y-m-d',time()));
                $count_profit_price = OrderIntegralLkDistribution::where('day',$today)->value('count_profit_price');
                if ($count_profit_price){
                    $data['count_profit_price'] = $count_profit_price;
                }

                $count_price = \App\Models\Order::where('status',2)->where('line_up',1)->sum('price');
                $count_profit_price = \App\Models\Order::where('status',2)->where('line_up',1)->sum('profit_price');
                $buttoncss = 'background: #5c6bc6;font-weight: 600;color: #fff;margin-bottom: 4px;display: inline;
padding: .24em .6em .34em;line-height: 1;text-align: center;white-space: nowrap;vertical-align: baseline;border-radius: .25em;cursor: pointer;box-sizing: border-box;';
                $spanCss = 'font-size: 120%';
                return "<div style='margin: 10px;text-align: center'>
                        <span style='$buttoncss'>(消费者LK)总数实时统计：<span style='".$spanCss."'>".$data['count_lk']."</span>个</span>&nbsp;&nbsp;&nbsp;
                        <span style='$buttoncss'>今日导入排队订单-(实际让利金额)统计：<span style='".$spanCss."'>".$data['count_profit_price']."</span>元</span>&nbsp;&nbsp;&nbsp;
                        <span style='$buttoncss'>剩余排队订单-(消费金额)统计：<span style='".$spanCss."'>".$count_price."</span>元</span>&nbsp;&nbsp;&nbsp;
                        <span style='$buttoncss'>剩余排队订单-(实际让利金额)统计：<span style='".$spanCss."'>".$count_profit_price."</span>元</span>
                        </div>";

            });

            $grid->model()->where('line_up',1);
            $grid->model()->orderBy('id','asc');
            $grid->model()->with(['user','business','select_trade_order']);

            $grid->column('id')->sortable();
            $grid->column('uid');

            $grid->column('business_uid');

            $grid->column('ddh','订单号')->display(function (){
                if($this->order_no){
                    return $this->order_no;
                }else{
                    $orderMod = new OrderModel();
                    return $orderMod->getOrderNo($this->id);
                }
            });

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


            $grid->column('payment_method')->display(function (){
                if($this->payment_method=='gwk'){
                    return Order::$ORDER_FROM[$this->payment_method];
                }else{
                    return '未知支付';
                }
            });
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
            $grid->disableActions();
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
                $filter->equal('payment_method')->select(function () {
                    return Order::$ORDER_FROM;
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
