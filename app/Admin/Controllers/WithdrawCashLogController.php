<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\ReGetWithdraw;
use App\Admin\Repositories\WithdrawCashLog;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use App\Models\WithdrawCashLog as WithModel;

class WithdrawCashLogController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $_this = $this;
        return Grid::make(new WithdrawCashLog(), function (Grid $grid) use ($_this)
        {
            $grid->model()->orderBy('id', 'desc');
            $grid->column('id')->sortable();
            $grid->column('balance_type')->display(function ()
            {
                return $this->balance_type_text;
            });
            $grid->column('channel')->display(function ()
            {
                return $this->channel_text;
            });;
            $grid->column('user_id');
//            $grid->column('alipay_account')->limit(10);
            $grid->column('order_no');
            $grid->column('money');
            $grid->column('handling_ratio')->display(function ()
            {
                return ($this->handling_ratio ?? '').'%';
            });
            $grid->column('handling_price');
            $grid->column('actual_amount');
            $grid->column('balance_fee');
            $grid->column('status')->using(WithModel::$statusText)->label(WithModel::$statusStyle);
            $grid->column('trans_date');
            $grid->column('alipay_user_id')->limit(10);
            $grid->column('alipay_avatar')->image('', 50, 50);
            $grid->column('alipay_nickname');
            $grid->column('real_name');
            $grid->column('out_trade_no');
            $grid->column('pay_fund_order_id');
//            $grid->column('remark')-limit(20);
            $grid->column('failed_reason')->limit(20);
            $grid->column('created_at')->sortable()->display(function ()
            {
                return $this->create_time;
            });
            $grid->column('updated_at')->sortable()->display(function ()
            {
                return $this->update_time;
            });
            //固定首尾列
            $grid->fixColumns(2, 0);
            /* 操作按钮 */
            $_this->customActions($grid);
            $_this->disableButton($grid);
            $_this->searchFilter($grid);
            $_this->exportExcel($grid);
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
        return Show::make($id, new WithdrawCashLog(), function (Show $show)
        {
            $show->field('id');
            $show->field('balance_type');
            $show->field('channel');
            $show->field('money');
            $show->field('user_id');
            $show->field('alipay_user_id');
            $show->field('alipay_account');
            $show->field('order_no');
            $show->field('alipay_nickname');
            $show->field('alipay_avatar');
            $show->field('real_name');
            $show->field('out_trade_no');
            $show->field('pay_fund_order_id');
            $show->field('trans_date');
            $show->field('handling_ratio');
            $show->field('handling_price');
            $show->field('actual_amount');
            $show->field('balance_fee');
            $show->field('status');
            $show->field('remark');
            $show->field('failed_reason');
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
        return Form::make(new WithdrawCashLog(), function (Form $form)
        {
            $form->display('id');
            $form->text('balance_type');
            $form->text('channel');
            $form->text('money');
            $form->text('user_id');
            $form->text('alipay_user_id');
            $form->text('alipay_account');
            $form->text('order_no');
            $form->text('alipay_nickname');
            $form->text('alipay_avatar');
            $form->text('real_name');
            $form->text('out_trade_no');
            $form->text('pay_fund_order_id');
            $form->text('trans_date');
            $form->text('handling_ratio');
            $form->text('handling_price');
            $form->text('actual_amount');
            $form->text('balance_fee');
            $form->text('status');
            $form->text('remark');
            $form->text('failed_reason');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
    
    /**
     * Description:
     *
     * @param  \Dcat\Admin\Grid  $grid
     *
     * @author lidong<947714443@qq.com>
     * @date 2021/8/14 0014
     */
    protected function disableButton(Grid $grid)
    {
        //禁用操作
//        $grid->disableActions();
        /* 禁用创建按钮 */
        $grid->disableCreateButton();
        /* 禁用编辑按钮 */
        $grid->disableEditButton();
        /* 禁用删除按钮 */
        $grid->disableDeleteButton();
        /* 禁用显示按钮 */
        $grid->disableViewButton();
        $grid->disableBatchDelete();
    }
    
    /**
     * Description:筛选条件
     *
     * @param  \Dcat\Admin\Grid  $grid
     *
     * @author lidong<947714443@qq.com>
     * @date 2021/8/14 0014
     */
    protected function searchFilter(Grid $grid)
    {
        $grid->filter(function (Grid\Filter $filter)
        {
            $filter->equal('id');
            $filter->equal('user_id');
            $filter->equal('order_no');
            $filter->equal('out_trade_no');
            $filter->equal('pay_fund_order_id');
            $filter->equal('status')->select(function ()
            {
                return WithModel::$statusText;
            });
        });
    }
    
    protected function exportExcel(Grid $grid)
    {
        $grid->export()->titles($this->getTitles())->rows(function (array $rows)
        {
            foreach ($rows as &$row) {
                $row[ 'balance_type' ] = $row[ 'balance_type_text' ];
                $row[ 'channel' ] = $row[ 'channel_text' ];
                $row[ 'handling_ratio' ] = $row[ 'handling_ratio' ].'%';
                $row[ 'status' ] = $row[ 'status_text' ];
            }
            return $rows;
        })->filename('现金提现-'.date('YmdHis'));
    }
    
    public function getTitles()
    : array
    {
        return [
            'id'                => admin_trans_field('id'),
            'balance_type'      => admin_trans_field('balance_type'),
            'channel'           => admin_trans_field('channel'),
            'user_id'           => admin_trans_field('user_id'),
            'order_no'          => admin_trans_field('order_no'),
            'money'             => admin_trans_field('money'),
            'handling_ratio'    => admin_trans_field('handling_ratio'),
            'handling_price'    => admin_trans_field('handling_price'),
            'actual_amount'     => admin_trans_field('actual_amount'),
            'balance_fee'       => admin_trans_field('balance_fee'),
            'status'            => admin_trans_field('status'),
            'trans_date'        => admin_trans_field('trans_date'),
            'alipay_user_id'    => admin_trans_field('alipay_user_id'),
            'out_trade_no'      => admin_trans_field('out_trade_no'),
            'pay_fund_order_id' => admin_trans_field('pay_fund_order_id'),
        ];
    }
    
    /**
     * Description:自定义操作
     *
     * @param  \Dcat\Admin\Grid  $grid
     *
     * @author lidong<947714443@qq.com>
     * @date 2021/8/24 0024
     */
    public function customActions(Grid $grid)
    {
        $grid->actions(
            function (Grid\Displayers\Actions $actions)
            {
                if ($this->status == WithModel::STATUS_DEFAULT) {
                    $actions->append(new ReGetWithdraw());
                }
            }
        );
    }
}
