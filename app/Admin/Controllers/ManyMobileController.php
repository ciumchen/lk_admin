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
        return Grid::make($this->model->where('create_type', '=', '3')->with(['orders']), function (Grid $grid) {
            $grid->model()->orderByDesc('id');
            $grid->column('id')->sortable();
            $grid->column('uid');
            $grid->column('order_no');
            $grid->column('money');
            $grid->column('name')->display(function () {
                return $this->orders[ 'name' ] ?? '';
            });
            $grid->column('profit_ratio')->display(function () {
                return $this->orders[ 'profit_ratio' ] ?? '';
            });
            $grid->column('to_be_added_integral')->display(function () {
                return $this->orders[ 'to_be_added_integral' ] ?? '';
            });
            $grid->column('orders.status', '审核状态')->using(Order::$statusLabel)->label(Order::$statusLabelStyle);
            $grid->column('orders.pay_status', '支付状态')->using(Order::$pay_status)->label(Order::$payStatusLabelStyle);
            $grid->column('created_at');
            $grid->column('updated_at')->sortable(); // 禁用创建按钮
            $grid->disableCreateButton();            // 禁用编辑按钮
            $grid->disableEditButton();              // 禁用删除按钮
            $grid->disableDeleteButton();
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
                $grid->column('order_id');
                $grid->column('order_no');
                $grid->column('mobile');
                $grid->column('money');
                $grid->column('pMobile.order_no');
                // 禁用创建按钮
                $grid->disableCreateButton();
                $grid->disableActions();
            }
        );
    }
}
