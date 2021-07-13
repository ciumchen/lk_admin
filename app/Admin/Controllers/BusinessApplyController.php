<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\ReviewBusinessApply;
use App\Admin\Repositories\BusinessApply;
use App\Admin\Repositories\BusinessData;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\Admin;
use App\Models\BusinessApply as BusinessApplyModel;

class BusinessApplyController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new BusinessApply(), function (Grid $grid) {
            $grid->model()->orderBy('id','desc');
            $grid->column('id')->sortable();
            $grid->column('uid');
//            $grid->column('img')->display(function ($v){
//                if ($v){
//                    return "<a href='".env('OSS_URL').$v."' target='_blank'>查看</a>";
//                }else{
//                    return "未上传";
//                }
//            });

            $grid->column('img')->image(env('OSS_URL'),50,50);
            $grid->column('img2','门头照')->image(env('OSS_URL'),50,50);
            $grid->column('phone');
            $grid->column('name');
//            $grid->column('work');
            $grid->column('remark')->editable(true);
//            $grid->column('status')->display(function ($v){
//                return BusinessApply::$statusLabel[$v];
//            });

            $grid->column('status')->using([1 => '审核中', 2 => '审核通过',3=>'审核不通过'])->label([
                1 => 'primary',
                2 => 'success',
                3 => 'danger',
                4 => Admin::color()->info()
            ]);




            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

//            $grid->disableViewButton();
            $grid->disableCreateButton();
            $grid->disableEditButton();
            $grid->addTableClass(['table-text-center']);
            $grid->withBorder();
            $grid->actions(function ($actions) {
                if($actions->row->status == 1 || $actions->row->status == 2){
                    // 去掉删除
                    $actions->disableDelete();
                }
                if (Admin::user()->id==1||Admin::user()->id==2){
                    $actions->disableDelete(false);
                }

                // 去掉编辑
                $actions->disableEdit();

                // 去掉查看
//                $actions->disableView();

                if($actions->row->status == 1)
                {
                    $actions->append(new ReviewBusinessApply());
                }

            });
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('uid');
                $filter->equal('phone');
                $filter->equal('name');
                $filter->equal('status')->select(function () {
                    return BusinessApply::$statusLabel;
                });

            });
        });
    }

    protected function form()
    {
        return Form::make(new BusinessApply(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->number("sort")->default(0);
            $form->display('created_at');
            $form->display('updated_at');



            if ($form->isDeleting()) {
                $form->image('img')->retainable();
                $form->image('img2')->retainable();
                $form->image('img_details1')->retainable();
                $form->image('img_details1')->retainable();
                $form->image('img_details1')->retainable();
                $form->image('img_details1')->retainable();
            }
        });
    }

    protected function detail($id)
    {
        return Show::make((new BusinessApplyModel())->getBusinessInfoId($id), new BusinessData(['user','cate','province','city','district','business_apply','userIdImg']), function (Show $show) {
            $show->row(function (Show\Row $show) {
                $show->width(4)->field('id');
                $show->width(4)->field('uid');
                $show->width(4)->field('user.username','用户名');
                $show->width(4)->field('user.phone','商户手机号');
                $show->width(4)->field('name');
//                $show->width(4)->field('content');

                $show->width(4)->field('cate.name','商家类型');
                $show->width(4)->field('contact_number');
                $show->width(4)->field('address');
                $show->width(4)->field('province.name',"省份");
                $show->width(4)->field('city.name',"城市");
                $show->width(4)->field('district.name',"地区");
                $show->width(4)->field('lt','经度');
                $show->width(4)->field('lg','纬度');

                $show->width(4)->field('status', '状态')->using([1 => '正常', 2 => '休息',3=>'已关店',4=>'店铺已被封禁']);//1正常，2休息，3已关店,4店铺已被封禁
                $show->width(4)->field('run_time');

                $show->width(4)->field('limit_price', '单日录单限额');
                $show->width(4)->field('is_recommend')->using([0 => '不推荐(非星级商家)', 1 => '推荐商家(星级商家)']);//是否推荐，0不推荐，1推荐',
                $show->width(4)->field('sort');
            });
            $show->row(function (Show\Row $show) {
                $show->width(3)->field('business_apply.img','营业执照')->image(env('OSS_URL'),50,50);
                $show->width(3)->field('business_apply.img2','商家头图')->image(env('OSS_URL'),50,50);
                $show->width(3)->field('user_id_img.img_just','身份证正面照')->image(env('OSS_URL'),50,50);
                $show->width(3)->field('user_id_img.img_back','身份证反面照')->image(env('OSS_URL'),50,50);
//                $show->width(3)->field('user_id_img.img_hold','身份证手持照')->image(env('OSS_URL'),50,50);

                $show->width(3)->field('business_apply.img_details1','店铺详情照1')->image(env('OSS_URL'),50,50);
                $show->width(3)->field('business_apply.img_details2','店铺详情照2')->image(env('OSS_URL'),50,50);
                $show->width(3)->field('business_apply.img_details3','店铺详情照3')->image(env('OSS_URL'),50,50);


                $show->width(4)->field('created_at');
                $show->width(4)->field('updated_at');

            });
            $show->disableDeleteButton();
        });
    }





}


