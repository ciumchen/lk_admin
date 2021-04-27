<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\LkMeiTuanOrder;
use App\Admin\Repositories\LkPhoneBillOrder;
use App\Admin\Repositories\Order;
use App\Models\CityNode;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class LkMeiTuanOrderController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new LkPhoneBillOrder(), function (Grid $grid) {
            $grid->model()->orderBy('id','desc');
            $grid->model()->where('description','=',"MT");
            $grid->model()->with(['user']);
            $grid->column('id')->sortable();

//            $grid->column('goods_id');
            $grid->column('order_no');//订单号
//            $grid->column('goods_bn');
            $grid->column('title');
            $grid->column('price');
            $grid->column('num');
//            $grid->column('shop_id');//所属商家
            $grid->column('profit_ratio')->display(function () {
                return ($this->profit_ratio*100).'%';
            });//让利比例
            $grid->column('integral');//获得积分

            $grid->column('user.username','买家用户名');//买家用户名
            $grid->column('user.phone','买家手机');//买家手机

            $grid->column('status')->display(function($v){
                if($v=='await'){
                    return '待支付';
                }elseif($v=='pending'){
                    return '支付处理中';
                }elseif($v=='succeeded'){
                    return '支付成功';
                }elseif($v=='failed'){
                    return '支付失败';
                }else{
                    return "订单异常";
                }
            });//订单状态

            $grid->column('refund_fee');
            $grid->column('aftersales_status');
            $grid->column('order_from');

            $grid->column('timeout_action_time');
            $grid->column('pay_time')->display(function (){
                return date('Y-m-d H:i:s',$this->pay_time);
            });
            $grid->column('end_time');
            $grid->column('modified_time');

            // 禁用删除按钮
            $grid->disableDeleteButton();
            //禁用新增按钮
            $grid->disableCreateButton();
            //禁用显示按钮
            $grid->disableViewButton();
            //禁用编辑按钮
            //$grid->disableEditButton();

            $titles = [
                'id' => 'ID',
//                'goods_id' => '商品ID',
                'order_no' => '订单号',
//                'goods_bn' => '明细商品的编码',
                'title' => '商品标题',
                'price' => '商品价格',
                'num' => '购买数量',
//                'shop_id' => '所属商家',
                'profit_ratio' => '商家让利',
                'integral' => '获得积分',
                'user.username' => '买家用户名',
                'user.phone' => '买家手机',
                'status' => '订单状态',
                'refund_fee' => '退款金额',
                'aftersales_status' => '售后状态',
                'order_from' => '订单来源',
                'timeout_action_time' => '订单超时到期时间',
                'pay_time' => '付款时间',
                'end_time' => '结束时间',
                'modified_time' => '最后更新时间',

            ];
            $grid->export($titles)->rows(function (array $rows) {
                foreach ($rows as $index => &$row) {
                    // 这里假设role就是关联数据
                    $row['user.username'] = $row['user']['username'];
                    $row['user.phone'] = $row['user']['phone'];
                    if($row['status']=='await'){
                        $row['status']="待支付";
                    }elseif($row['status']=='pending'){
                        $row['status']="支付处理中";
                    }elseif($row['status']=='succeeded'){
                        $row['status']="支付成功";
                    }elseif($row['status']=='failed'){
                        $row['status']="支付失败";
                    }else{
                        $row['status']="订单异常";
                    }

                    $row['pay_time']=date('Y-m-d H:i:s',$row['pay_time']);

                }
                return $rows;
            });

            //筛选
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('goods_id');
                $filter->equal('shop_id');
                $filter->equal('user.phone','买家手机号');
                $filter->equal('order_no');
                //支付状态
                $filter->equal('status')->select(function () {
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
    protected function form()
    {
        return Form::make(new LkPhoneBillOrder(), function (Form $form) {
            $form->display('id');
            $form->display('shop_id');
            $form->display('user_id');
            $form->display('order_no');
            $form->text('status');

        });
    }
}
