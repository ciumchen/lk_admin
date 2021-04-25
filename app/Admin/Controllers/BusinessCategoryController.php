<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\BusinessCategory;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class BusinessCategoryController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new BusinessCategory(), function (Grid $grid) {
            $grid->model()->orderBy('id','desc');
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column("img_url")->display(function ($v){
                return "<img src='".env("OSS_URL")."/".$v."' style='width: 100px;height: 100px;'>";
            });
            $grid->column("sort");
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->disableViewButton();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new BusinessCategory(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->image('img_url')->uniqueName()->accept('jpg,png,gif,jpeg', 'image/*')->disk('oss')->move('/business/category')->autoUpload();
            $form->number("sort")->default(0);
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
