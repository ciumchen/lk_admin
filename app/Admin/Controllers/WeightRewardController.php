<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\WeightReward;
use App\Models\WeightRewards;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class WeightRewardController extends AdminController
{
    
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $_this = $this;
        return Grid::make(new WeightReward(), function (Grid $grid) use ($_this) {
            $grid->column('id')->sortable();
            $grid->column('count_date');
            $grid->column('silver_money');
            $grid->column('gold_money');
            $grid->column('diamond_money');
            $grid->column('is_deal')->using(WeightRewards::$isDealText)->label(WeightRewards::$isDealStyle);
            $grid->column('created_at')->display(function ($a) {
                return date('Y-m-d H:i:s', strtotime($a));
            });
            $grid->column('updated_at')->display(function ($a) {
                return date('Y-m-d H:i:s', strtotime($a));
            })->sortable();
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
        return Show::make($id, new WeightReward(), function (Show $show) {
            $show->field('id');
            $show->field('count_date');
            $show->field('silver_money');
            $show->field('gold_money');
            $show->field('diamond_money');
            $show->field('is_deal');
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
        return Form::make(new WeightReward(), function (Form $form) {
            $form->display('id');
            $form->text('count_date');
            $form->text('silver_money');
            $form->text('gold_money');
            $form->text('diamond_money');
            $form->text('is_deal');
            $form->display('created_at')->customFormat(function ($a) {
                return date('Y-m-d H:i:s', strtotime($a));
            });
            $form->display('updated_at')->customFormat(function ($a) {
                return date('Y-m-d H:i:s', strtotime($a));
            });
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
            $filter->equal('is_deal')->select(WeightRewards::$isDealText);
        });
    }
}
