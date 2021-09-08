<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\GwkLog;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class GwkLogController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new GwkLog(), function (Grid $grid) {
            $grid->model()->orderBy('id','desc');
            $grid->column('id')->sortable();
            $grid->column('day');
            $grid->column('count_profit_price');
            $grid->column('price_5');
            $grid->column('price_10');
            $grid->column('price_20');
            $grid->column('other_price');
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
            $grid->disableActions();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

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
        return Show::make($id, new GwkLog(), function (Show $show) {
            $show->field('id');
            $show->field('day');
            $show->field('count_profit_price');
            $show->field('price_5');
            $show->field('price_10');
            $show->field('price_20');
            $show->field('other_price');
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
        return Form::make(new GwkLog(), function (Form $form) {
            $form->display('id');
            $form->text('day');
            $form->text('count_profit_price');
            $form->text('price_5');
            $form->text('price_10');
            $form->text('price_20');
            $form->text('other_price');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
