<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\WeightRewardsLog;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class WeightRewardsLogController extends AdminController
{
    
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $_this = $this;
        return Grid::make(new WeightRewardsLog(), function (Grid $grid) use ($_this) {
            $grid->column('id')->sortable();
            $grid->column('order_no');
            $grid->column('count_date');
            $grid->column('silver_money');
            $grid->column('gold_money');
            $grid->column('diamond_money');
            $grid->column('silver_ratio');
            $grid->column('gold_ratio');
            $grid->column('diamond_ratio');
            $grid->column('money');
            $grid->column('created_at')->display(function ($a) {
                return date('Y-m-d H:i:s', strtotime($a));
            });
            $grid->column('updated_at')->sortable()->display(function ($a) {
                return date('Y-m-d H:i:s', strtotime($a));
            });
            //固定首尾列
            $grid->fixColumns(2, 0);
            /* 操作按钮 */
            $_this->disableButton($grid);
            $_this->searchFilter($grid);
        });
    }
    
    /**
     * Make a show builder.
     *
     * @param  mixed  $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new WeightRewardsLog(), function (Show $show) {
            $show->field('id');
            $show->field('order_no');
            $show->field('count_date');
            $show->field('silver_money');
            $show->field('gold_money');
            $show->field('diamond_money');
            $show->field('silver_ratio');
            $show->field('gold_ratio');
            $show->field('diamond_ratio');
            $show->field('money');
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
        return Form::make(new WeightRewardsLog(), function (Form $form) {
            $form->display('id');
            $form->text('order_no');
            $form->text('count_date');
            $form->text('silver_money');
            $form->text('gold_money');
            $form->text('diamond_money');
            $form->text('silver_ratio');
            $form->text('gold_ratio');
            $form->text('diamond_ratio');
            $form->text('money');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
    
    /**
     * Description:
     *
     * @param  \Dcat\Admin\Grid  $grid
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/14 0014
     */
    protected function disableButton(Grid $grid)
    {
        //禁用操作
        $grid->disableActions();
        /* 禁用创建按钮 */
        $grid->disableCreateButton();
        /* 禁用编辑按钮 */
        $grid->disableEditButton();
        /* 禁用删除按钮 */
        $grid->disableDeleteButton();
        /* 禁用显示按钮 */
        $grid->disableViewButton();
        $grid->disableBatchDelete();
    }
    
    /**
     * Description:筛选条件
     *
     * @param  \Dcat\Admin\Grid  $grid
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/14 0014
     */
    protected function searchFilter(Grid $grid)
    {
        $grid->filter(function (Grid\Filter $filter) {
            $filter->equal('id');
            $filter->equal('count_date');
            $filter->equal('order_no');
        });
    }
}
