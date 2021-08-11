<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\RealNameAuthAction;
use App\Admin\Actions\Grid\ReviewBusinessApply;
use App\Admin\Repositories\BusinessApply;
use App\Admin\Repositories\RealNameAuthenTication;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class RealNameAuthenTicationController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new RealNameAuthenTication(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('uid');
            $grid->column('name');
            $grid->column('num_id');
            $grid->column('status')->using([0 => '审核中', 1 => '审核通过',2=>'审核不通过'])->label([
                1 => 'primary',
                2 => 'success',
                3 => 'danger',
                4 => Admin::color()->info()
            ]);
//            $grid->column('img')->image(env('OSS_URL'),50,50);
            $grid->column('img_just')->image(env('OSS_URL'),50,50);
            $grid->column('img_back')->image(env('OSS_URL'),50,50);
            $grid->column('remark');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            //            $grid->disableViewButton();
            $grid->disableCreateButton();
            $grid->disableEditButton();
            $grid->addTableClass(['table-text-center']);
            $grid->withBorder();
            $grid->disableBatchDelete();
            $grid->disableCreateButton();
            $grid->disableActions();
            $grid->disableBatchDelete();
            $grid->actions(function ($actions) {
                $actions->disableDelete();
                // 去掉编辑
                $actions->disableEdit();
                // 去掉查看
                $actions->disableView();

            });
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('uid');
                $filter->equal('phone');
                $filter->equal('name');
                $filter->equal('status')->select(function () {
                    return BusinessApply::$statusLabel;
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
        return Show::make($id, new RealNameAuthenTication(), function (Show $show) {
            $show->field('id');
            $show->field('uid');
            $show->field('name');
            $show->field('num_id');
            $show->field('status');
            $show->field('img_just');
            $show->field('img_back');
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
        return Form::make(new RealNameAuthenTication(), function (Form $form) {
            $form->display('id');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
