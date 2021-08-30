<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\UserLevelRelation;
use App\Models\UserLevel;
use App\Models\UserLevelRelation as UserRelationModel;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class UserLevelRelationController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $_this = $this;
        return Grid::make(new UserLevelRelation(), function (Grid $grid) use ($_this)
        {
            $grid->model()->orderByDesc('user_id');
//            $grid->column('id')->sortable();
            $grid->column('user_id')->sortable();
            $grid->column('level_id')->using(UserLevel::getTypesArray());
            $grid->column('diamond_id');
            $grid->column('gold_id');
            $grid->column('silver_id');
            $grid->column('invite_id');
            $grid->column('integral');
            $grid->column('direct_num');
            $grid->column('direct_diamond_num');
            $grid->column('direct_gold_num');
            $grid->column('direct_silver_num');
            $grid->column('direct_activity');
            $grid->column('direct_integral');
            $grid->column('team_num');
            $grid->column('team_diamond_num');
            $grid->column('team_gold_num');
            $grid->column('team_silver_num');
            $grid->column('team_activity');
            $grid->column('team_integral');
            $grid->column('is_verified')
                 ->using(UserRelationModel::$isVerifiedText)
                 ->label(UserRelationModel::$isVerifiedStyle);
            $grid->column('is_vip')
                 ->using(UserRelationModel::$isVipText)
                 ->label(UserRelationModel::$isVipStyle);
            $grid->column('pid_route')->display(function ()
            {
                return trim($this->pid_route, ',');
            })->limit(5);
            $grid->column('is_ban')->switch();
            $grid->fixColumns(2, 0);
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
        return Show::make($id, new UserLevelRelation(), function (Show $show)
        {
            $show->field('id');
            $show->field('user_id');
            $show->field('level_id');
            $show->field('diamond_id');
            $show->field('gold_id');
            $show->field('silver_id');
            $show->field('invite_id');
            $show->field('integral');
            $show->field('direct_num');
            $show->field('direct_type');
            $show->field('direct_activity');
            $show->field('direct_integral');
            $show->field('team_num');
            $show->field('team_type');
            $show->field('team_activity');
            $show->field('team_integral');
            $show->field('is_verified');
            $show->field('pid_route');
            $show->field('is_ban');
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
        return Form::make(new UserLevelRelation(), function (Form $form)
        {
            $form->display('id');
            $form->text('user_id');
            $form->text('level_id');
            $form->text('diamond_id');
            $form->text('gold_id');
            $form->text('silver_id');
            $form->text('invite_id');
            $form->text('integral');
            $form->text('direct_num');
            $form->text('direct_type');
            $form->text('direct_activity');
            $form->text('direct_integral');
            $form->text('team_num');
            $form->text('team_type');
            $form->text('team_activity');
            $form->text('team_integral');
            $form->text('is_verified');
            $form->text('pid_route');
            $form->text('is_ban');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
    
    /**
     * Description:筛选
     *
     * @param  \Dcat\Admin\Grid  $grid
     *
     * @author lidong<947714443@qq.com>
     * @date 2021/8/30 0030
     */
    public function searchFilter(Grid $grid)
    {
        $grid->filter(function (Grid\Filter $filter)
        {
//            $filter->equal('id');
            $filter->equal('user_id');
            $filter->equal('invite_id');
            $filter->equal('diamond_id');
            $filter->equal('gold_id');
            $filter->equal('silver_id');
            $filter->equal('is_vip');
            $filter->equal('level_id')->select(UserLevel::getTypesArray());
        });
    }
    
    public function exportExcel(Grid $grid)
    {
    }
    
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
     * Description:自定义操作
     *
     * @param  \Dcat\Admin\Grid  $grid
     *
     * @date 2021/8/30 0030
     */
    public function customActions(Grid $grid)
    {
    }
    
    /**
     * Description:导出标题设置
     *
     * @return array
     * @author lidong<947714443@qq.com>
     * @date 2021/8/30 0030
     */
    public function getTitles()
    : array
    {
        return [
            'id'              => admin_trans_field('id'),
            'user_id'         => admin_trans_field('user_id'),
            'level_id'        => admin_trans_field('level_id'),
            'diamond_id'      => admin_trans_field('diamond_id'),
            'gold_id'         => admin_trans_field('gold_id'),
            'silver_id'       => admin_trans_field('silver_id'),
            'invite_id'       => admin_trans_field('invite_id'),
            'integral'        => admin_trans_field('integral'),
            'direct_num'      => admin_trans_field('direct_num'),
            'direct_activity' => admin_trans_field('direct_activity'),
            'direct_integral' => admin_trans_field('direct_integral'),
            'team_num'        => admin_trans_field('team_num'),
            'team_activity'   => admin_trans_field('team_activity'),
            'team_integral'   => admin_trans_field('team_integral'),
            'is_verified'     => admin_trans_field('is_verified'),
            'pid_route'       => admin_trans_field('pid_route'),
            'is_ban'          => admin_trans_field('is_ban'),
            'created_at'      => admin_trans_field('created_at'),
            'updated_at'      => admin_trans_field('updated_at'),
        ];
    }
}
