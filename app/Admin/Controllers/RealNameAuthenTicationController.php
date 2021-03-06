<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\RealNameAuthAction;
use App\Admin\Actions\Grid\ReviewBusinessApply;
use App\Admin\Repositories\BusinessApply;
use App\Admin\Repositories\RealNameAuthenTication;
use App\Models\Users;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use Illuminate\Support\Facades\Log;
use App\Models\RealNameAuthenTication as RealNameAuthModel;
class RealNameAuthenTicationController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new RealNameAuthenTication(), function (Grid $grid) {
            $grid->model()->orderBy('id', 'desc');
            $grid->column('id')->sortable();
            $grid->column('uid');
            $grid->column('name');
            $grid->column('num_id');
            $grid->column('img_just')->image(env('OSS_URL'),50,50);
            $grid->column('img_back')->image(env('OSS_URL'),50,50);
            $grid->column('status','OCR验证')->using([0 => '验证中', 1 => '验证成功',2=>'验证失败'])->label([
                0 => 'primary',
                1 => 'success',
                2 => 'danger',
                4 => Admin::color()->info()
            ]);

            $grid->column('remark');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            //            $grid->disableViewButton();
            $grid->disableCreateButton();
            $grid->disableEditButton();
            $grid->addTableClass(['table-text-center']);
            $grid->withBorder();
            $grid->disableBatchDelete();
            $grid->disableCreateButton();
//            $grid->disableActions();

            $grid->actions(function ($actions) {
//                $actions->disableDelete();
                // 去掉编辑
                $actions->disableEdit();
                // 去掉查看
                $actions->disableView();

            });
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('uid');
                $filter->like('name');
                $filter->equal('status')->select(function () {
                    return RealNameAuthenTication::$sfz_statusLabel;
                });

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
//    protected function detail($id)
//    {
//        return Show::make($id, new RealNameAuthenTication(), function (Show $show) {
//            $show->field('id');
//            $show->field('uid');
//            $show->field('name');
//            $show->field('num_id');
//            $show->field('status');
//            $show->field('img_just');
//            $show->field('img_back');
//            $show->field('remark');
//            $show->field('created_at');
//            $show->field('updated_at');
//        });
//    }
//
//    /**
//     * Make a form builder.
//     *
//     * @return Form
//     */
    protected function form()
    {
        return Form::make(new RealNameAuthenTication(), function (Form $form) {
            if ($form->isDeleting()) {
                $id = $form->getKey();
                $realData = RealNameAuthModel::find($id);
                $userInfo = Users::where('id',$realData->uid)->first();
                $userInfo->is_auth = 1;
                $userInfo->alipay_user_id = '';
                $userInfo->save();

            }

            $form->display('id');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }


}
