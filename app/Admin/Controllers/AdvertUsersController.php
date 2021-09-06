<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\DisableGather;
use App\Models\AdvertUsers;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;

class AdvertUsersController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new AdvertUsers(), function (Grid $grid) {
            $grid->model()->orderBy('id','desc');
            $grid->column('id')->sortable();
            $grid->column('uid', '用户id')->sortable();
            $grid->column('award', '奖励额度')->sortable();
            $grid->column('type', '类型')->display(function ($type){
                return AdvertUsers::ADVERT_TYPE[$type];
            });
            $grid->column('brand', '渠道')->display(function ($brand){
                return AdvertUsers::ADVERT_BRAND[$brand];
            });
            $grid->column('status', '状态')->display(function ($status){
                return AdvertUsers::ADVERT_STATUS[$status];
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
                $filter->equal('id', 'id');
                $filter->equal('uid', '用户id');
                $filter->equal('type', '广告类型');
                $filter->equal('brand', '渠道(1 奖励；2 拼团)');
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
        return Show::make($id, new AdvertUsers(), function (Show $show) {
            $show->field('id');
            $show->field('uid');
            $show->field('award');
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
        return Form::make(new AdvertUsers(), function (Form $form) {
            $form->display('id');
            $form->display('uid');
            $form->display('award');
            $form->text('type');
            $form->text('status');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
