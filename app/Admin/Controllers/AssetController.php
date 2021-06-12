<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Asset;
use App\Admin\Repositories\AssetsType;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class AssetController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Asset(), function (Grid $grid) {
            $grid->model()->orderBy('id','desc');
            $grid->model()->with(['user','type']);
            $grid->column('id')->sortable();
            $grid->column('uid');
            $grid->column('user.phone',"用户");
            $grid->column('assets_type_id');
            $grid->column('assets_name');
            $grid->column('amount');
            $grid->column('freeze_amount');
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
        return Show::make($id, new Asset(), function (Show $show) {
            $show->field('id');
            $show->field('uid');
            $show->field('assets_type_id');
            $show->field('assets_name');
            $show->field('amount');
            $show->field('freeze_amount');
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
        return Form::make(new Asset(), function (Form $form) {
            $form->display('id');
            $form->text('uid');
            $form->text('assets_type_id');
            $form->text('assets_name');
            $form->text('amount');
            $form->text('freeze_amount');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
