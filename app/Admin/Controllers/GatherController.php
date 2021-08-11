<?php

namespace App\Admin\Controllers;

use App\Models\Gather;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use App\Admin\Actions\Grid\DisableConvert;
use Illuminate\Http\Request;

class GatherController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Gather(), function (Grid $grid) {
            $grid->model()->orderBy('id','desc');
            $grid->column('id')->sortable();
            $grid->column('type', '类型');
            $grid->column('status', '状态')->display(function ($v){
                return Gather::GATHER_STATUS[$v];
            });
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            /* 禁用创建按钮 */
            //$grid->disableCreateButton();
            /* 禁用编辑按钮 */
            //$grid->disableEditButton();
            /* 禁用删除按钮 */
            $grid->disableDeleteButton();
            /* 禁用显示按钮 */
            $grid->disableViewButton();
            $grid->disableBatchDelete();
            $grid->perPages([20, 50, 100, 200, 500]);

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('type');
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
        return Show::make($id, new Gather(), function (Show $show) {
            $show->field('id');
            $show->field('type');
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
        return Form::make(new Gather(), function (Form $form) {
            $form->display('id');
            $form->text('type');
            $form->text('status');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
