<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\AdvertTrade;
use App\Admin\Repositories\Order;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class AdvertTradeController extends AdminController
{
    public $columns_name = [
        'oid'          => '订单ID',
        'uid'          => '消费者ID',
        'order_no'     => '订单号',
        'name'         => '名称',
        'price'        => '录单金额',
        'profit_ratio' => '商家让利',
        'profit_price' => '让利金额',
        'status'       => '审核状态',
        'pay_status'   => '支付状态',
    ];

    /**
     * Description:
     * @return \Dcat\Admin\Grid
     * @author
     */
    public function grid()
    {
        $Order = new AdvertTrade(['orders']);
        return Grid::make(
            $Order,
            function (Grid $grid) use ($Order) {
                $grid->model()->orderBy('id', 'desc');
                $grid->column('oid', '订单ID')->sortable();
                $grid->column('uid', '消费者ID');
                $grid->column('order_no', '订单号');
                $grid->column('orders.name', '名称');
                $grid->column('price', '录单金额');
                $grid->column('profit_ratio', '让利比例（%）');
                $grid->column('profit_price', '让利金额');
                $grid->column('orders.status', '审核状态')
                    ->using(Order::$statusLabel)
                    ->label(Order::$statusLabelStyle);
                $grid->column('orders.pay_status', '支付状态')
                    ->using(Order::$pay_status)
                    ->label(Order::$payStatusLabelStyle);
                $grid->column('created_at');
                $grid->column('updated_at')->sortable();

                /* 禁用创建按钮 */
                $grid->disableCreateButton();
                /* 禁用编辑按钮 */
                $grid->disableEditButton();
                /* 禁用删除按钮 */
                $grid->disableDeleteButton();
                /* 禁用显示按钮 */
                $grid->disableViewButton();
                $grid->disableBatchDelete();
                $grid->perPages([20, 50, 100, 200, 500]);
                /* 筛选 */
                $grid->filter(
                    function (Grid\Filter $filter) {
                        $filter->equal('oid', '订单ID');
                        $filter->equal('uid', '消费者ID');
                        $filter->equal('order_no', '订单号');
                        $filter->equal('orders.status', '审核状态')->select(
                            function () {
                                return Order::$statusLabel;
                            }
                        );
                        //支付状态
                        $filter->equal('orders.pay_status', '支付状态')->select(
                            function () {
                                return Order::$pay_status;
                            }
                        );
                        $filter->between('created_at')->datetime();
                    }
                );
                /* 导出 */
                $grid->export($this->columns_name)->rows(
                    function (array $rows) {
                        foreach ($rows as &$row)
                        {
                            $row['status'] = Order::$statusLabel[$row['orders']['status']] ?? '';
                            unset($row['orders']);
                        }
                        return $rows;
                    }
                );
                $grid->export()->filename('广告录单数据-'.date('YmdHis'));
            }
        );
    }

    public function detail($id)
    {
        $Order = new AdvertTrade(['orders']);
        return Show::make(
            $id,
            $Order,
            function (Show $show) {
                $show->field('oid');
                $show->field('uid');
                $show->field('order_no');
                $show->field('name');
                $show->field('price');
                $show->field('profit_ratio');
                $show->field('profit_price');
                $show->field('status');
                $show->field('pay_status');
            }
        );
    }

    protected function form()
    {
        $Order = new AdvertTrade(['orders']);
        return Form::make(
            $Order,
            function (Form $form) {
                $form->display('id');
                $form->field('oid');
                $form->field('uid');
                $form->field('order_no');
                $form->field('name');
                $form->field('price');
                $form->field('profit_ratio');
                $form->field('profit_price');
                $form->field('status');
                $form->field('pay_status');
            }
        );
    }
}
