<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\ManualWithdraw;
use App\Admin\Actions\Grid\RefuseWithdraw;
use App\Admin\Repositories\AssetsType;
use App\Admin\Repositories\WithdrawLog;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class WithdrawLogController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new WithdrawLog(), function (Grid $grid) {
            $grid->model()->orderBy('id','desc');
            $grid->model()->with(['user']);
            $grid->column('id')->sortable();
            $grid->column('uid');
            $grid->column('user.phone','用户');
            $grid->column('assets_type_id');
            $grid->column('assets_type');
            $grid->column('address')->display(function ($v){
                if($v) {
                    return "<a href='https://qkiscan.cn/address/{$v}' target='_blank'>点击查看</a>";
                }
            });
            $grid->column('amount');
            $grid->column('fee');
            $grid->column('tx_hash')->display(function ($v){
                if($v){
                    return "<a href='https://qkiscan.cn/tx/{$v}' target='_blank'>点击查看</a>";
                }
            });
            $grid->column('status')->display(function ($v){
                return WithdrawLog::$statusLabel[$v];
            });
            $grid->column('ip');
            $grid->column('remark');
            $grid->column('user_agent');
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

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('uid');
                $filter->equal('address');
                $filter->equal('tx_hash');
                $filter->equal('assets_type_id')->select(function () {
                    return AssetsType::getAssetsArr();
                });
                $filter->equal('status')->select(function () {
                    return WithdrawLog::$statusLabel;
                });
            });

            $grid->actions(function (Grid\Displayers\Actions $actions) {
                if($actions->row->status == WithdrawLog::STATUS_DEFAULT || $actions->row->status == WithdrawLog::STATUS_TO_BE_REVIEWED || !$actions->row->tx_hash)
                {
                    $actions->append(new ManualWithdraw());
                }

                if($actions->row->status == WithdrawLog::STATUS_TO_BE_REVIEWED)
                {
                    $actions->append(new RefuseWithdraw());
                }
            });
        });
    }
}
