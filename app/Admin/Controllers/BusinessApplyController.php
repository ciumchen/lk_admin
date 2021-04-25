<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\ReviewBusinessApply;
use App\Admin\Repositories\BusinessApply;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

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
            $grid->column('img')->display(function ($v){
                return "<a href='".env('OSS_URL').$v."' target='_blank'>查看营业执照</a>";
            });;
            $grid->column('phone');
            $grid->column('name');
            $grid->column('work');
            $grid->column('remark');
            $grid->column('status')->display(function ($v){
                return BusinessApply::$statusLabel[$v];
            });
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->disableViewButton();
            $grid->disableCreateButton();
            $grid->disableEditButton();
            $grid->actions(function ($actions) {
                if($actions->row->status == 1 || $actions->row->status == 2){
                    // 去掉删除
                    $actions->disableDelete();
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
                $filter->equal('phone');
                $filter->equal('name');

            });
        });
    }

}
