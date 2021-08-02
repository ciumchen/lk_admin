<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Order;
use App\Admin\Repositories\Convert;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use App\Admin\Actions\Grid\DisableConvert;

class ConvertController extends AdminController
{
    public $columns_name = [
        'oid'          => '订单ID',
        'uid'          => '消费者ID',
        'order_no'     => '订单号',
        'phone'        => '手机号',
        'name'         => '兑换商品',
        'price'        => '兑换金额',
        'profit_ratio' => '商家让利',
        'profit_price' => '让利金额',
        'status'       => '审核状态',
        'pay_status'   => '支付状态',
    ];
    
    /**
     * Description:
     *
     * @return \Dcat\Admin\Grid
     * @author
     */
    public function grid()
    {
        $Order = new Convert(['orders']);
        return Grid::make(
            $Order,
            function (Grid $grid) use ($Order) {
                $grid->model()->orderBy('id', 'desc');
                $grid->column('oid', '订单ID')->sortable();
                $grid->column('uid', '消费者ID');
                $grid->column('order_no', '订单号');
                $grid->column('phone', '手机号');
                $grid->column('name')
                     ->display(function () {
                         return $this->orders[ 'name' ] ?? '';
                     });
                $grid->column('price', '兑换金额');
                $grid->column('profit_ratio', '让利比例（%）')
                     ->display(function () {
                         return $this->orders[ 'profit_ratio' ] ?? '';
                     });
                $grid->column('profit_price', '让利金额')
                     ->display(function () {
                         return $this->orders[ 'profit_price' ] ?? '';
                     });
                $grid->column('orders.status', '审核状态')
                     ->using(Order::$statusLabel)
                     ->label(Order::$statusLabelStyle);
                $grid->column('orders.pay_status', '支付状态')
                     ->using(Order::$pay_status)
                     ->label(Order::$payStatusLabelStyle);
                $grid->column('status', '充值状态')
                     ->using(Convert::$statusTexts)
                     ->label(Convert::$statusLabelStyle);
                $grid->column('created_at');
                $grid->column('updated_at')->sortable();
                /* 操作按钮 更新充值状态*/
                $grid->actions(function (Grid\Displayers\Actions $actions) {
                    if ($actions->row->type == 1) {
                        return;
                    }
                    $actions->append(new DisableConvert());
                });
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
                        $filter->equal('phone', '手机号');
                        $filter->equal('type', '兑换类型')->select(
                            function () {
                                return Convert::$createType_text;
                            }
                        );
                        $filter->equal('orders.status', '审核状态')->select(
                            function () {
                                return Order::$statusLabel;
                            }
                        );
                        $filter->equal('status', '充值状态')->select(
                            function () {
                                return Convert::$statusTexts;
                            }
                        );
                        //支付状态
                        $filter->equal('orders.pay_status', '支付状态')->select(
                            function () {
                                return Order::$pay_status;
                            }
                        );
                        $filter->between('updated_at')->datetime();
                    }
                );
                /* 导出 */
                $grid->export($this->columns_name)->rows(
                    function (array $rows) {
                        foreach ($rows as &$row) {
                            //$row[ 'orders.status' ] = Order::$statusLabel[ $row[ 'orders' ][ 'status' ] ] ?? '';
                            //$row[ 'pay_status' ] = Order::$pay_status[ $row[ 'orders' ][ 'pay_status' ] ] ?? '';
                            $row[ 'type' ] = Convert::$createType_text[ $row[ 'type' ] ] ?? '';
                            $row[ 'status' ] = Convert::$statusTexts[ $row[ 'status' ] ] ?? '';
                            //$row[ 'profit_ratio' ] = $row[ 'orders' ][ 'profit_ratio' ];
                            //$row[ 'profit_price' ] = $row[ 'orders' ][ 'profit_price' ];
                            //$row[ 'name' ] = $row[ 'orders' ][ 'name' ];
                        }
                        return $rows;
                    }
                );
                $grid->export()->filename('兑换充值数据-'.date('YmdHis'));
            }
        );
    }
    
    public function detail($id)
    {
        $Order = new Convert(['orders']);
        return Show::make(
            $id,
            $Order,
            function (Show $show) {
                $show->field('oid');
                $show->field('uid');
                $show->field('order_no');
                $show->field('phone');
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
        $Order = new Convert(['orders']);
        return Form::make(
            $Order,
            function (Form $form) {
                $form->display('id');
                $form->field('oid');
                $form->field('uid');
                $form->field('order_no');
                $form->field('phone');
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
