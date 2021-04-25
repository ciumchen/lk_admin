<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\RebateData;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class RebateDataController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new RebateData(), function (Grid $grid) {
            $grid->model()->orderBy('id','desc');
            $grid->column('id')->sortable();
            $grid->column('day');
            $grid->column('consumer');
            $grid->column('business');
            $grid->column('welfare');
            $grid->column('share');
            $grid->column('market');
            $grid->column('platform');
            $grid->column('people');
            $grid->column('join_consumer');
            $grid->column('join_business');
            $grid->column('new_business');
            $grid->column('total_consumption');
            $grid->column('consumer_lk_iets');
            $grid->column('business_lk_iets');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->disableActions();
            $grid->disableCreateButton();

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
        return Show::make($id, new RebateData(), function (Show $show) {
            $show->field('id');
            $show->field('day');
            $show->field('consumer');
            $show->field('business');
            $show->field('welfare');
            $show->field('share');
            $show->field('market');
            $show->field('platform');
            $show->field('people');
            $show->field('join_consumer');
            $show->field('join_business');
            $show->field('new_business');
            $show->field('total_consumption');
            $show->field('consumer_lk_iets');
            $show->field('business_lk_iets');
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
        return Form::make(new RebateData(), function (Form $form) {
            $form->display('id');
            $form->text('day');
            $form->text('consumer');
            $form->text('business');
            $form->text('welfare');
            $form->text('share');
            $form->text('market');
            $form->text('platform');
            $form->text('people');
            $form->text('join_consumer');
            $form->text('join_business');
            $form->text('new_business');
            $form->text('total_consumption');
            $form->text('consumer_lk_iets');
            $form->text('business_lk_iets');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
