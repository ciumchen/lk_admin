<?php

namespace App\Admin\Controllers;

use App\Models\Gather;
use App\Models\GatherUsers;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use App\Admin\Actions\Grid\DisableConvert;
use Illuminate\Http\Request;

class GatherWinningController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new GatherUsers(), function (Grid $grid) {
            $grid->model()->orderBy('id','desc');
            $grid->column('id')->sortable();
            $grid->column('gid', '拼团ID')->sortable();
            $grid->column('uid', '用户ID')->sortable();
            $grid->column('type', '是否中奖')->display(function ($type){
                return GatherUsers::GATHERUSER_TYPE[$type];
            });
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            /* 禁用创建按钮 */
            $grid->disableCreateButton();
            /* 禁用编辑按钮 */
            $grid->disableEditButton();
            /* 禁用删除按钮 */
            $grid->disableDeleteButton();
            /* 禁用显示按钮 */
            $grid->disableViewButton();
            $grid->disableBatchDelete();
            $grid->perPages([20, 50, 100, 200, 500]);

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('gid', '拼团ID');
                $filter->equal('uid', '用户ID');
                $filter->equal('type', '是否中奖(0 未；1 是)');
                $filter->between('created_at')->datetime();
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
        return Show::make($id, new GatherShoppingCard(), function (Show $show) {
            $show->field('id');
            $show->field('gid');
            $show->field('uid');
            $show->field('type');
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
        return Form::make(new GatherShoppingCard(), function (Form $form) {
            $form->display('id');
            $form->display('gid');
            $form->display('uid');
            $form->display('type');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
