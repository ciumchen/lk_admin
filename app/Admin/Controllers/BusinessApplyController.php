<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\ReviewBusinessApply;
use App\Admin\Repositories\BusinessApply;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\Admin;

class BusinessApplyController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new BusinessApply(), function (Grid $grid) {
            $grid->model()->orderBy('id','desc');
            $grid->column('id')->sortable();
            $grid->column('uid');
//            $grid->column('img')->display(function ($v){
//                if ($v){
//                    return "<a href='".env('OSS_URL').$v."' target='_blank'>查看</a>";
//                }else{
//                    return "未上传";
//                }
//            });

            $grid->column('img')->image(env('OSS_URL'),50,50);
            $grid->column('img2','门头照')->image(env('OSS_URL'),50,50);
            $grid->column('phone');
            $grid->column('name');
//            $grid->column('work');
            $grid->column('remark')->editable(true);
//            $grid->column('status')->display(function ($v){
//                return BusinessApply::$statusLabel[$v];
//            });

            $grid->column('status')->using([1 => '审核中', 2 => '审核通过',3=>'审核不通过'])->label([
                1 => 'primary',
                2 => 'success',
                3 => 'danger',
                4 => Admin::color()->info()
            ]);




            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->disableViewButton();
            $grid->disableCreateButton();
            $grid->disableEditButton();
            $grid->addTableClass(['table-text-center']);
            $grid->withBorder();
            $grid->actions(function ($actions) {
                if($actions->row->status == 1 || $actions->row->status == 2){
                    // 去掉删除
                    $actions->disableDelete();
                }
                if (Admin::user()->id==1||Admin::user()->id==2){
                    $actions->disableDelete(false);
                }

                // 去掉编辑
                $actions->disableEdit();

                // 去掉查看
                $actions->disableView();

                if($actions->row->status == 1)
                {
                    $actions->append(new ReviewBusinessApply());
                }

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

    protected function form()
    {
        return Form::make(new BusinessApply(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->number("sort")->default(0);
            $form->display('created_at');
            $form->display('updated_at');



            if ($form->isDeleting()) {
                $form->image('img')->retainable();
                $form->image('img2')->retainable();
                $form->image('img_details1')->retainable();
                $form->image('img_details1')->retainable();
                $form->image('img_details1')->retainable();
                $form->image('img_details1')->retainable();
            }
        });
    }

}
