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
        });
    }
}
