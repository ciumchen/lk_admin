<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\DisableBusiness;
use App\Admin\Actions\Grid\EnableBusiness;

use App\Admin\Actions\Grid\LimitPriceBusiness;
use App\Admin\Repositories\BusinessData;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\Show;
use Illuminate\Support\Facades\DB;

class BusinessDataController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new BusinessData(), function (Grid $grid) {
            $grid->model()->orderBy('id','desc');
            $grid->model()->with(['user','cate','province','city','district','business_apply']);
            $grid->column('id')->sortable();
            $grid->column('uid');
//            $grid->column('user.username','用户名');
            $grid->column('user.phone','用户手机号');
//            $grid->column('business_apply.img','营业执照')->display(function ($v){
//                if ($v){
//                    return "<a href='".env('OSS_URL').$v."' target='_blank'>查看</a>";
//                }else{
//                    return "未上传";
//                }
//
//            });

            $grid->column('business_apply.img','营业执照')->image(env('OSS_URL'),50,50);
            $grid->column('business_apply.img2','门头照')->image(env('OSS_URL'),50,50);

            $grid->column('contact_number');
            $grid->column('address');
            $grid->column('province.name',"省份");
            $grid->column('city.name',"城市");
            $grid->column('district.name',"地区");
//            $grid->column('lt');//经度
//            $grid->column('lg');//纬度
            $grid->column('cate.name','商家类型');
            $grid->column('status', '状态')->display(function ($v){
                return BusinessData::$statusLabel[$v];
            });
            $grid->column('run_time');
            $grid->column('content');
            $grid->column('name');
            $grid->column('limit_price', '单日录单限额');
            $grid->column('is_recommend')->switch('', true);
            $grid->column('sort')->editable(true);
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->disableCreateButton();
            $grid->disableEditButton();
//            $grid->disableViewButton();
            $grid->addTableClass(['table-text-center']);
            $grid->withBorder();
            $grid->actions(function (Grid\Displayers\Actions $actions) {
                if($actions->row->status == 1)
                {
                    $actions->append(new DisableBusiness());
                }else{
                    $actions->append(new EnableBusiness());
                }
                $actions->append(new LimitPriceBusiness());

            });
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('uid');
//                $filter->equal('user.username','用户名');
                $filter->equal('user.phone','用户手机号');
                $filter->equal('contact_number');
                $filter->equal('limit_price', '单日录单限额');
                $filter->equal('is_recommend', '推荐商家')->select(function () {
                    return BusinessData::$IS_RECOMMEND;
                });

            });
        });
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new BusinessData(), function (Form $form) {
            $form->number('sort');
            $form->switch('is_recommend');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }



    protected function detail($id)
    {
        return Show::make($id, new BusinessData(['user','cate','province','city','district','business_apply']), function (Show $show) {
            $show->field('id');
            $show->field('uid');
            $show->field('user.username','用户名');
            $show->field('user.phone','用户手机号');
//            $show->field('business_apply_id');
            $show->field('name');
            $show->field('content');

            $show->field('cate.name','商家类型');
            $show->field('contact_number');
            $show->field('address');
            $show->field('province.name',"省份");
            $show->field('city.name',"城市");
            $show->field('district.name',"地区");
            $show->field('lt','经度');
            $show->field('lg','纬度');


            $show->field('status', '状态')->using([1 => '正常', 2 => '休息',3=>'已关店',4=>'店铺已被封禁']);//1正常，2休息，3已关店,4店铺已被封禁

            $show->field('run_time');

            $show->field('limit_price', '单日录单限额');
            $show->field('is_recommend');
            $show->field('sort');

            $show->field('business_apply.img','营业执照')->image(env('OSS_URL'),250,250);
            $show->field('business_apply.img2','商家头图')->image(env('OSS_URL'),250,250);
            $show->field('business_apply.img_just','身份证正面照')->image(env('OSS_URL'),250,250);
            $show->field('business_apply.img_back','身份证反面照')->image(env('OSS_URL'),250,250);
            $show->field('business_apply.img_hold','身份证手持照')->image(env('OSS_URL'),250,250);

            $show->field('business_apply.img_details','店铺详情照')->image(env('OSS_URL'),250,250);


//            $show->field('business_apply.img_details','店铺详情照')->display(function ($v) {
//
//                return json_decode($v, true);
//
//            })->image(env('OSS_URL'),250,250);

            $show->field('created_at');
            $show->field('updated_at');


            $show->disableDeleteButton();
        });
    }





}
