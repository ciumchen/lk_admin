<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Setting;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class SysPriceController extends AdminController
{
    /**显示列表
     * Make a grid builder.
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Setting(), function (Grid $grid) {
            $grid->model()->where('key', 'like', 'sys_price%');
            $grid->model()->orderBy('id', 'desc');
            $grid->column('id')->sortable();
            $grid->column('key');
            $grid->column('value');
            $grid->column('msg');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->disableViewButton();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('key');
            });
        });
    }

    /**编辑数据
     * Make a show builder.
     * @param mixed $id
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

    /**新增数据
     * Make a form builder.
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Setting(), function (Form $form) {
            $form->display('id');
            $form->text('key', '参数名称')->default('sys_price')->required();
            $form->display('参数名称说明')->value("示例：sys_price_dd，话费：hf，油卡：yk，美团：mt，滴滴：dd，直充：zl");
            $form->text('value', '价格区间')->required();
            $form->display('价格区间说明')->value("示例：1000|500|200|100|50");
            $form->text('msg', '充值价格')->default('设置充值价格区间');
            $form->display('created_at');
            $form->display('updated_at');

            $form->footer(function ($footer) {
                //去掉`查看`checkbox
                $footer->disableViewCheck();
                //去掉`继续编辑`checkbox
                $footer->disableEditingCheck();
                //去掉`继续创建`checkbox
                $footer->disableCreatingCheck();
            });
        });
    }
}
