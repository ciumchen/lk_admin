<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\ReGetCard;
use App\Admin\Repositories\Order;
use App\Admin\Repositories\OrderVideo;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class VideoOrderController extends AdminController
{
    public $columns_name = [
        'order_id'             => '录单ID',
        'user_id'              => '消费者ID',
        'order_no'             => '订单号',
        'name'                 => '消费商品',
        'goods_title'          => '商品名称',
        'money'                => '商品价格',
        'profit_ratio'         => '商家让利',
        'to_be_added_integral' => '获得积分',
        'channel'              => '渠道',
        'status'               => '审核状态',
        'pay_status'           => '支付状态',
    ];
    
    /**
     * Description:
     *
     * @return \Dcat\Admin\Grid
     * @author lidong<947714443@qq.com>
     * @date   2021/6/30 0030
     */
    public function grid()
    {
        $Order = new OrderVideo(['orders']);
        return Grid::make(
            $Order,
            function (Grid $grid) use ($Order) {
                $grid->model()->orderBy('id', 'desc');
                $grid->column('order_id', '录单ID')->sortable();
                $grid->column('user_id');
                $grid->column('order_no');
//                $grid->column('name')
//                     ->display(
//                         function () {
//                             return $this->orders[ 'name' ] ?? '';
//                         }
//                     );
                $grid->column('goods_title');
                $grid->column('money');
                $grid->column('profit_ratio')
                     ->display(function () {
                         return ($this->orders[ 'profit_ratio' ] ?? '').'%';
                     });
                $grid->column('to_be_added_integral')
                     ->display(
                         function () {
                             return $this->orders[ 'to_be_added_integral' ] ?? '';
                         }
                     );
                $grid->column('orders.status', '审核状态')
                     ->using(Order::$statusLabel)
                     ->label(Order::$statusLabelStyle);
                $grid->column('orders.pay_status', '支付状态')
                     ->using(Order::$pay_status)
                     ->label(Order::$payStatusLabelStyle);
                $grid->column('status', '卡密状态')
                     ->using(OrderVideo::$statusTexts)
                     ->label(OrderVideo::$statusLabelStyle);
                $grid->column('channel')->using($Order::$channel_text);
                $grid->column('created_at');
                $grid->column('updated_at')->sortable();
                /* 操作按钮 */
                $grid->actions(
                    function (Grid\Displayers\Actions $actions) {
                        if ($this->status == OrderVideo::STATUS_FAIL) {
                            $actions->append(new ReGetCard());
                        }
                    }
                );
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
                        $filter->equal('order_id', '录单ID');
                        $filter->equal('user_id', '消费者ID');
                        $filter->equal('order_no', '订单号');
                        $filter->like('goods_title', '商品名称');
                        $filter->equal('orders.status', '审核状态')->select(
                            function () {
                                return Order::$statusLabel;
                            }
                        );
                        $filter->equal('status', '卡密状态')->select(
                            function () {
                                return OrderVideo::$statusTexts;
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
                            $row[ 'status' ] = Order::$statusLabel[ $row[ 'orders' ][ 'status' ] ] ?? '';
                            $row[ 'pay_status' ] = Order::$pay_status[ $row[ 'orders' ][ 'pay_status' ] ] ?? '';
                            $row[ 'profit_ratio' ] = $row[ 'orders' ][ 'profit_ratio' ];
                            $row[ 'name' ] = $row[ 'orders' ][ 'name' ];
                            $row[ 'to_be_added_integral' ] = $row[ 'orders' ][ 'to_be_added_integral' ];
                            $row[ 'channel' ] = OrderVideo::$channel_text[ $row[ 'channel' ] ] ?? '';
                        }
                        return $rows;
                    }
                );
            }
        );
    }
    
    public function detail($id)
    {
        $Order = new OrderVideo(['orders']);
        return Show::make(
            $id,
            $Order,
            function (Show $show) {
                $show->field('order_id');
                $show->field('user_id');
                $show->field('order_no');
                $show->field('name');
                $show->field('goods_title');
                $show->field('money');
                $show->field('profit_ratio');
                $show->field('to_be_added_integral');
                $show->field('channel');
                $show->field('status');
                $show->field('pay_status');
            }
        );
    }
    
    protected function form()
    {
        $Order = new OrderVideo(['orders']);
        return Form::make(
            $Order,
            function (Form $form) {
                $form->display('id');
                $form->field('order_id');
                $form->field('user_id');
                $form->field('order_no');
                $form->field('name');
                $form->field('goods_title');
                $form->field('money');
                $form->field('profit_ratio');
                $form->field('to_be_added_integral');
                $form->field('channel');
                $form->field('status');
                $form->field('pay_status');
            }
        );
    }
}
