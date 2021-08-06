<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\DisableMemberHeadUser;
use App\Admin\Actions\Grid\DisableUser;
use App\Admin\Actions\Grid\EnableMemberHeadUser;
use App\Admin\Actions\Grid\EnableUser;
use App\Admin\Repositories\User;
use App\Models\Password;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\Admin;
class UserController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new User(), function (Grid $grid) {
            $grid->model()->orderBy('id','desc');
            $grid->model()->with(['invite']);
            $grid->column('id')->sortable();
            $grid->column('invite_uid', '邀请人')->display(function (){
                if($this->invite_uid > 0)
                {
                    return $this->invite['phone']."（UID：".$this->invite_uid."）";
                }else{
                    return 0;
                }
            });
            $grid->column('phone', '手机号');
            $grid->column('salt');
            $grid->column('code_invite');
            $grid->column('member_status')->display(function ($v){
                if ($v==0){
                    return "否";
                }elseif($v==1){
                    return "是";
                }else{
                    return "异常";
                }

            });
            $grid->column('role')->display(function ($v){
                return User::$roleLabel[$v];
            });
            $grid->column('role')->display(function ($v){
                return User::$roleLabel[$v];
            });
            $grid->column('member_head','盟主')->display(function ($v){
                return User::$memberHeadLabel[$v];
            });
            $grid->column('business_lk');
            $grid->column('lk');
            $grid->column('business_integral');
            $grid->column('integral');
            $grid->column('return_integral');
            $grid->column('return_business_integral');
            $grid->column('return_lk');
            $grid->column('ban_reason');
            if (Admin::user()->id==1||Admin::user()->id==2){
                $grid->column('market_business')->switch('', true);
            }else{
                $grid->column('market_business')->display(function($v){
                    if($v==1){
                        return "<span style='color: green;font-weight:bold;'>市商</span>";
                    }else{
                        return "<span style='color: red;font-weight:bold;'>非市商</span>";
                    }
                });
            }

            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
            // 禁用创建按钮
            $grid->disableCreateButton();
            // 禁用删除按钮
            $grid->disableDeleteButton();
            // 禁用编辑按钮
            $grid->disableEditButton();
            // 禁用显示按钮
            $grid->disableViewButton();
            $grid->disableBatchDelete();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('invite_uid');
                $filter->equal('phone', '手机号');
                $filter->equal('status')->select(function () {
                    return User::$statusLabel;
                });
                $filter->equal('role', '用户类型')->select(function () {
                    return User::$roleLabel;
                });
                $filter->equal('member_head', '盟主类型')->select(function () {
                    return User::$memberHeadLabel;
                });

                $filter->equal('market_business', '市商')->select(function () {
                    return User::$market_business;
                });




            });
            $grid->actions(function (Grid\Displayers\Actions $actions) {

                if($actions->row->status == User::STATUS_NORMAL)
                {
                    $actions->append(new DisableUser());
                }else{
                    $actions->append(new EnableUser());
                }
                if($actions->row->member_head == 2)
                {
                    $actions->append(new DisableMemberHeadUser());

                }elseif($actions->row->member_head == 3){
                    $actions->append(new EnableMemberHeadUser());
                }else{
                    $actions->append(new EnableMemberHeadUser());
                }
            });
        });
    }

    protected function form()
    {
        return Form::make(new User(), function (Form $form) {
            $form->display('market_business');

        });
    }

}
