<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\UserData;
use App\Models\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class UserDataController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new UserData(), function (Grid $grid) {
            $grid->model()->orderBy('id','desc');
            $grid->model()->with(['user']);
            $grid->column('id')->sortable();
            $grid->column('uid');
            $grid->column('user.username','用户名');
            $grid->column('user.phone','用户手机号');
            $grid->column('last_login');
            $grid->column('last_ip');
            $grid->column('change_address_time');
            $grid->column('change_password_time');
            $grid->column('change_password_ip');
            $grid->column('id_card');
            $grid->column('name');

            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            // 禁用删除按钮
            $grid->disableDeleteButton();
            //禁用新增按钮
            $grid->disableCreateButton();
            //禁用显示按钮
            $grid->disableViewButton();
            //禁用编辑按钮
            $grid->disableEditButton();
            $grid->disableBatchDelete();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('uid');
                $filter->equal('id_card');
                $filter->equal('name');
                $filter->equal('user.username','用户名');
                $filter->equal('user.phone','用户手机号');
                $filter->equal('last_ip');
                $filter->equal('change_password_ip');

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
        return Show::make($id, new UserData(), function (Show $show) {
            $show->field('id');
            $show->field('uid');
            $show->field('google2fa_secret');
            $show->field('change_address_time');
            $show->field('change_password_time');
            $show->field('change_password_ip');
            $show->field('change_password_user_agent');
            $show->field('last_login');
            $show->field('last_ip');
            $show->field('id_card');
            $show->field('real_name');
            $show->field('cat_address', '猫爪地址');
            $show->field('created_at');
            $show->field('updated_at');
            $show->disableDeleteButton();
        });
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new UserData(), function (Form $form) {
            $form->disableDeleteButton();
            $form->display('id');
            $form->text('uid');
            $form->text('last_ip')->default('127.0.0.1');
            $form->text('id_card');
            $form->text('real_name');
            $form->text('cat_address', '猫爪地址');
            $form->text('google2fa_secret');
            $form->saved(function (Form $form, $result) {
                //判断是否是修改操作
                if ($form->isEditing()) {
                    if(!$form->real_name && !$form->id_card){
                        User::whereId($form->uid)->update(['is_auth' => 1]);
                    }
                }
            });
        });
    }
}
