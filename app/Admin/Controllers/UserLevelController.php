<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\UserLevel;
use App\Models\UserLevel as LevelModel;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class UserLevelController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    : Grid
    {
        return Grid::make(new UserLevel(), function (Grid $grid)
        {
            $grid->model()->orderByDesc('sort');
            $grid->combine(
                '升级限制',
                [
                    'self_integral',
                    'direct_num',
                    'direct_type',
                    'direct_activity',
                    'direct_integral',
                    'team_num',
                    'team_type',
                    'team_activity',
                    'team_integral',
                    'is_verified',
                ]
            )
                 ->help('会员升级需要达到的条件');
            $grid->tableCollapse(false);
//            $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('level')->sortable();
//            $grid->column('sort')->sortable();
            $grid->column('promotion_rewards_ratio')->display(function ()
            {
                return ($this->promotion_rewards_ratio ?? '').'%';
            });
            $grid->column('same_level_rewards_ratio')->display(function ()
            {
                return ($this->same_level_rewards_ratio ?? '').'%';
            });;
            $grid->column('weighted_equally_rewards_ratio')->display(function ()
            {
                return ($this->weighted_equally_rewards_ratio ?? '').'%';
            });;
            $grid->column('self_integral');
            $grid->column('direct_num');
            $grid->column('direct_type')->using(LevelModel::getTypesArray());
            $grid->column('direct_activity');
            $grid->column('direct_integral');
            $grid->column('team_num');
            $grid->column('team_type')->using(LevelModel::getTypesArray());
            $grid->column('team_activity');
            $grid->column('team_integral');
            $grid->column('is_verified')->switch();
            $grid->column('is_auto_update')->switch();
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
            $grid->filter(function (Grid\Filter $filter)
            {
                $filter->equal('id');
            });
            //固定首尾列
            $grid->fixColumns(2, -1);
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
        return Show::make($id, new UserLevel(), function (Show $show)
        {
            $show->field('id');
            $show->field('title');
            $show->field('level');
            $show->field('sort');
            $show->field('promotion_rewards_ratio');
            $show->field('same_level_rewards_ratio');
            $show->field('weighted_equally_rewards_ratio');
            $show->field('self_integral');
            $show->field('direct_num');
            $show->field('direct_type');
            $show->field('direct_activity');
            $show->field('direct_integral');
            $show->field('team_num');
            $show->field('team_type');
            $show->field('team_activity');
            $show->field('team_integral');
            $show->field('is_auto_update');
            $show->field('is_verified');
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
        return Form::make(new UserLevel(), function (Form $form)
        {
            $form->disableListButton();
            // 第一列占据1/2的页面宽度
            $form->column(6, function (Form $form)
            {
                $form->display('id');
                $form->text('title')
                     ->required()
                     ->help('请设置该等级的'.admin_trans_field('title'));
                $form->select('level')
                     ->options(LevelModel::getLevelsArray())
                     ->default(0)
                     ->help('请设置该等级的'.admin_trans_field('level').',数字越大等级越高');
                $form->rate('promotion_rewards_ratio')
                     ->default(0)
                     ->required()
                     ->help('请设置该等级的'.admin_trans_field('promotion_rewards_ratio').'获得比例');
                $form->rate('same_level_rewards_ratio')
                     ->default(0)
                     ->required()
                     ->help('请设置该等级的'.admin_trans_field('same_level_rewards_ratio').'获得比例');
                $form->rate('weighted_equally_rewards_ratio')
                     ->default(0)
                     ->required()
                     ->help('请设置该等级的'.admin_trans_field('weighted_equally_rewards_ratio').'获得比例');
                $form->radio('is_auto_update')
                     ->options([0 => '否', 1 => '是'])
                     ->default(1)
                     ->help('请设置该等级的是否可以'.admin_trans_field('is_auto_update'));
                $form->number('sort')
                     ->default(0)->help('请设置'.admin_trans_field('sort').',数字越大排序越靠前');
                $form->display('created_at');
                $form->display('updated_at');
            });
            // 第一列占据1/2的页面宽度
            $form->column(6, function (Form $form)
            {
                $form->decimal('self_integral')
                     ->default(0)
                     ->help('请设置该等级升级需要达到的'.admin_trans_field('self_integral'));
                $form->number('direct_num')
                     ->default(0)
                     ->help('请设置该等级升级需要达到的'.admin_trans_field('direct_num'));
                $form->select('direct_type')
                     ->options(LevelModel::getTypesArray())
                     ->help('请设置该等级升级需要达到的'.admin_trans_field('direct_type'));
                $form->number('direct_activity')
                     ->default(0)
                     ->help('请设置该等级升级需要达到的'.admin_trans_field('direct_activity'));
                $form->decimal('direct_integral')
                     ->default(0)
                     ->help('请设置该等级升级需要达到的'.admin_trans_field('direct_integral'));
                $form->number('team_num')->default(0)->help('请设置该等级升级需要达到的'.admin_trans_field('team_num'));
                $form->select('team_type')
                     ->options(LevelModel::getTypesArray())
                     ->help('请设置该等级升级需要达到的'.admin_trans_field('team_type'));
                $form->number('team_activity')->default(0)->help('请设置该等级升级需要达到的'.admin_trans_field('team_activity'));
                $form->decimal('team_integral')->default(0)->help('请设置该等级升级需要达到的'.admin_trans_field('team_integral'));
                $form->radio('is_verified')
                     ->options([0 => '否', 1 => '是'])
                     ->default(1)
                     ->help('请设置该等级升级是否需要'.admin_trans_field('is_verified'));
            });
        });
    }
}
