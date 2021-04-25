<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Ad;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class AdController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Ad(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('position')->display(function($v){
                return Ad::$positionLabel[$v];
            });
            $grid->column("img_url")->display(function ($v){
                return "<a href='".env("OSS_URL")."/".$v."' target='_blank'><img src='".env("OSS_URL")."/".$v."' style='width: 100px;height: 100px;'></a>";
            });
            $grid->column('status')->display(function($v){
                return Ad::$statusLabel[$v];
            });
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->disableViewButton();

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
        return Show::make($id, new Ad(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('position');
            $show->field('img_url');
            $show->field('status');
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
        return Form::make(new Ad(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->select('position')->options(Ad::$positionLabel)->required();
            $form->image('img_url')->uniqueName()->accept('jpg,png,gif,jpeg', 'image/*')->disk('oss')->move('/lk/ad')->autoUpload()->required();
            $form->radio('status')->options(Ad::$statusLabel)->default(Ad::SHOW)->required();

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
