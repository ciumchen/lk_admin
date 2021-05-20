<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\AssetsLog;
use App\Admin\Repositories\AssetsType;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class AssetsLogController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new AssetsLog(), function (Grid $grid) {
            $grid->model()->orderBy('id','desc');
            $grid->model()->where('remark','邀请商家，获得盈利返佣');
            $grid->model()->with(['user']);
            $grid->column('id')->sortable();
            $grid->column('assets_type_id');
            $grid->column('assets_name');
            $grid->column('uid');
            $grid->column('user.phone',"用户");
            $grid->column('operate_type')->display(function ($v){
                return AssetsLog::$operateTypeTexts[$v] ?? $v;
            });
            $grid->column('amount');
            $grid->column('amount_before_change');
            $grid->column('tx_hash');
            $grid->column('ip');
            $grid->column('user_agent');
            $grid->column('remark');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->disableCreateButton();
            $grid->disableActions();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('assets_type_id')->select(function () {
                    return AssetsType::getAssetsArr();
                });
                $filter->equal('uid');
                $filter->equal('tx_hash');
                $filter->equal('ip');
                $filter->equal('operate_type')->select(function () {
                    return AssetsLog::$operateTypeTexts;
                });

            });


            $titles = [
                'id' => 'ID',
                'assets_type_id' => '资产类型ID',
                'assets_name' => '资产名称',
                'uid' => '用户UID',
                'user.phone' => '用户',
                'operate_type' => '操作类型',
                'amount' => '变动数量',
                'amount_before_change' => '变动前数量',
                'tx_hash' => '交易Hash',
                'ip' => 'IP',
                'user_agent' => 'Ua',
                'remark' => '备注',
                'created_at' => '创建时间',
                'updated_at' => '更新时间',

            ];
            $grid->export($titles)->rows(function (array $rows) {
                foreach ($rows as $index => &$row) {
                    // 这里假设role就是关联数据
                    $row['user.phone'] = $row['user']['phone'];

                }
                return $rows;
            });








        });
    }
}
