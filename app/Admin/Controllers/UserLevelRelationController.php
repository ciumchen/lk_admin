<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\UserLevelRelation;
use App\Models\UserLevel;
use App\Services\UserRelationService;
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
//        $UserRelationService = new UserRelationService();
//        $res = $UserRelationService->updateIsVerified();
//        dd($res);
        return Grid::make(new UserLevelRelation(), function (Grid $grid)
        {
            $grid->column('id')->sortable();
            $grid->column('user_id');
            $grid->column('level_id')->using(UserLevel::getTypesArray());
            $grid->column('diamond_id');
            $grid->column('gold_id');
            $grid->column('silver_id');
            $grid->column('invite_id');
            $grid->column('integral');
            $grid->column('direct_num');
            $grid->column('direct_type');
            $grid->column('direct_activity');
            $grid->column('direct_integral');
            $grid->column('team_num');
            $grid->column('team_type');
            $grid->column('team_activity');
            $grid->column('team_integral');
            $grid->column('is_verified');
            $grid->column('pid_route');
            $grid->column('is_ban');
//            $grid->column('created_at');
//            $grid->column('updated_at')->sortable();
            $grid->filter(function (Grid\Filter $filter)
            {
                $filter->equal('id');
            });
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
}
