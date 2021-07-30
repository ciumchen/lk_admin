<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Order;
use App\Admin\Repositories\OrderMobileDetails;
use App\Models\OrderMobileRecharge;
use App\Models\OrderMobileRechargeDetails;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use Illuminate\Database\Eloquent\Model;

class ManyMobileController extends AdminController
{
    protected $model;
    
    public function __construct()
    {
        $this->model = new OrderMobileRecharge();
    }
    
    //
    public function grid()
    : Grid
    {
        return Grid::make($this->model->where('create_type', '=', '3')->with(['orders', 'details']),
            function (Grid $grid) {
                $grid->model()->orderByDesc('order_id');
                $grid->column('order_id', '录单ID')->sortable();
                $grid->column('uid');
                $grid->column('order_no');
                $grid->column('money');
                $grid->column('name')->display(function () {
                    return $this->orders[ 'name' ] ?? '';
                });
                $grid->column('profit_ratio')->display(function () {
                    return ($this->orders[ 'profit_ratio' ] ?? '').'%';
                });
                $grid->column('to_be_added_integral')->display(function () {
                    return $this->orders[ 'to_be_added_integral' ] ?? '';
                });
                $grid->column('orders.status', '审核状态')->using(Order::$statusLabel)->label(Order::$statusLabelStyle);
                $grid->column('orders.pay_status', '支付状态')
                     ->using(Order::$pay_status)
                     ->label(Order::$payStatusLabelStyle);
                $grid->column('details.mobile', '充值手机')->display(function ($aa = '') {
                    foreach ($this->details as $k => $item) {
                        $aa .= $item[ 'mobile' ]."<br/>";
                        unset($item);
                    }
                    return $aa;
                });
                $grid->column('created_at');
                $grid->column('updated_at')->sortable(); // 禁用创建按钮
                $grid->disableCreateButton();            // 禁用编辑按钮
                $grid->disableEditButton();              // 禁用删除按钮
                $grid->disableDeleteButton();
                $grid->filter(function (Grid\Filter $filter) {
                    $filter->equal('order_id', '录单ID');
                    $filter->equal('uid', '消费者ID');
                    $filter->equal('details.mobile', '手机号');
                    $filter->equal('orders.pay_status', '支付状态');
                });
            });
    }
    
    public function form()
    : Form
    {
        return Form::make($this->model, function (Form $form) {
        });
    }
    
    public function detail($id)
    : Grid {
        $Model = (new OrderMobileRechargeDetails())->with(['pMobile'])->where('order_mobile_id', '=', $id);
        return Grid::make(
            $Model,
            function (Grid $grid) {
                $grid->model()->orderByDesc('id');
                $grid->column('order_id', '订单ID');
                $grid->column('id', '子单ID')->sortable();
                $grid->column('pMobile.order_no', '订单号');
                $grid->column('order_no', '子单号');
                $grid->column('mobile', '充值手机');
                $grid->column('money');
                $grid->column('status', '充值状态')
                     ->using(OrderMobileRechargeDetails::$statusLabel)
                     ->label(OrderMobileRechargeDetails::$statusLabelStyle);
                $grid->column('created_at');
                $grid->column('updated_at')->sortable();
                // 禁用创建按钮
                $grid->disableCreateButton();
                $grid->disableActions();
                $grid->disablePagination();
            }
        );
    }
}
