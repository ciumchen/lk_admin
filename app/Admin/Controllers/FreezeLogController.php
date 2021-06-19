<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\AssetsType;
use App\Admin\Repositories\FreezeLog;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class FreezeLogController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new FreezeLog(), function (Grid $grid) {
            $grid->model()->orderBy('id','desc');
            $grid->model()->with(['user']);
            $grid->column('id')->sortable();
            $grid->column('assets_type_id');
            $grid->column('assets_name');
            $grid->column('uid');
            $grid->column('operate_type')->display(function ($v){
                return FreezeLog::$operateTypeTexts[$v] ?? $v;
            });
            $grid->column('amount');
            $grid->column('amount_before_change');
            $grid->column('ip');
            $grid->column('user_agent');
            $grid->column('remark');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->disableCreateButton();
            $grid->disableActions();
            $grid->disableBatchDelete();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('uid');
                $filter->equal('assets_type_id')->select(function () {
                    return AssetsType::getAssetsArr();
                });
                $filter->equal('operate_type')->select(function () {
                    return FreezeLog::$operateTypeTexts;
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
    protected function detail($id)
    {
        return Show::make($id, new FreezeLog(), function (Show $show) {
            $show->field('id');
            $show->field('assets_type_id');
            $show->field('assets_name');
            $show->field('uid');
            $show->field('operate_type');
            $show->field('amount');
            $show->field('amount_before_change');
            $show->field('ip');
            $show->field('user_agent');
            $show->field('remark');
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
        return Form::make(new FreezeLog(), function (Form $form) {
            $form->display('id');
            $form->text('assets_type_id');
            $form->text('assets_name');
            $form->text('uid');
            $form->text('operate_type');
            $form->text('amount');
            $form->text('amount_before_change');
            $form->text('ip');
            $form->text('user_agent');
            $form->text('remark');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
