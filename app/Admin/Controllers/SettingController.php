<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Setting;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class SettingController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Setting(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('key');
            $grid->column('value');
            $grid->column('msg');
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
        return Show::make($id, new Setting(), function (Show $show) {
            $show->field('id');
            $show->field('key');
            $show->field('value');
            $show->field('msg');
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
        return Form::make(new Setting(), function (Form $form) {
            ini_set('memory_limit','2000M');
            $form->display('id');
            $form->text('key');
            $form->text('value');
            $form->file('app_url', '若是文件或图片，无需填写参数值')->accept('apk,ipa')->maxSize(512000000)->disk('oss')->move('/download')->autoUpload();

            $form->text('msg');
            $form->saving(function (Form $form) {

                if($form->app_url)
                    $form->value = $form->app_url;
                $form->deleteInput('app_url');
            });



            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
