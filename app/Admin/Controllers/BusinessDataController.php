<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\DisableBusiness;
use App\Admin\Actions\Grid\EnableBusiness;

use App\Admin\Actions\Grid\LimitPriceBusiness;
use App\Admin\Repositories\BusinessData;
use App\Models\BusinessApply;
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
            $grid->column('user.phone','商户手机号');


            $grid->column('business_apply.img','营业执照')->image(env('OSS_URL'),50,50);
            $grid->column('business_apply.img2','门头照')->image(env('OSS_URL'),50,50);

            $grid->column('contact_number')->editable(true);
            $grid->column('address')->editable(true);
            $grid->column('province.name',"省份");
            $grid->column('city.name',"城市");
            $grid->column('district.name',"地区");
//            $grid->column('lt');//经度
//            $grid->column('lg');//纬度
            $grid->column('cate.name','商家类型');
            $grid->column('status', '状态')->display(function ($v){
                return BusinessData::$statusLabel[$v];
            });
            $grid->column('run_time')->editable(true);
//            $grid->column('content');
            $grid->column('name')->editable(true);
            $grid->column('limit_price', '单日录单限额');
            $grid->column('is_recommend')->switch('', true);
            $grid->column('sort')->editable(true);
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->disableCreateButton();
//            $grid->disableEditButton();
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
                $filter->equal('user.phone','商户手机号');
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
        return Form::make(new BusinessData(['user','cate','province','city','district','business_apply','userIdImg']), function (Form $form) {
            if ($form->isDeleting()) {
                $id = $form->getKey();
                $re = DB::table('business_data')->where('id',$id)->first();
                $data['role'] = 1;
                $role = DB::table('users')->where('id',$re->uid)->value('role');
                if($role==2){
                    DB::table('users')->where('id',$re->uid)->update($data);
                }
                BusinessApply::where('uid',$re->uid)->where('status',2)->delete();
                $form->image('img')->retainable();
                $form->image('img2')->retainable();
                $form->image('img_details1')->retainable();
                $form->image('img_details1')->retainable();
                $form->image('img_details1')->retainable();
                $form->image('img_details1')->retainable();
            }
            $form->column(4, function (Form $form) {
            $form->display('id');
            $form->display('uid');
            $form->display('name');

            $form->image('business_apply.img','营业执照')->removable(false)->uniqueName()->accept('jpg,png,gif,jpeg', 'image/*')->disk('oss')->move('/business/category')->autoUpload();

            });
            $form->column(4, function (Form $form) {
                $form->display('is_recommend');
                $form->display('contact_number');
                $form->display('address');
            });
            $form->column(4, function (Form $form) {
                $form->display('run_time');
                $form->display('name');
                $form->display('sort');
//            $form->display('business_apply.img','营业执照');

            //            $form->image('business_apply.img2','商家门头照')->uniqueName()->accept('jpg,png,gif,jpeg', 'image/*')->disk('oss')->move('/business/category')->autoUpload();
//            $form->image('userIdImg.img_just','身份证正面')->uniqueName()->accept('jpg,png,gif,jpeg', 'image/*')->disk('oss')->move('/business/category')->autoUpload();
//            $form->image('userIdImg.img_back','身份证反面')->uniqueName()->accept('jpg,png,gif,jpeg', 'image/*')->disk('oss')->move('/business/category')->autoUpload();
//            $form->image('userIdImg.img_hold','身份证手持')->uniqueName()->accept('jpg,png,gif,jpeg', 'image/*')->disk('oss')->move('/business/category')->autoUpload();
//            $form->image('business_apply.img_details1','商家详情照1')->uniqueName()->accept('jpg,png,gif,jpeg', 'image/*')->disk('oss')->move('/business/category')->autoUpload();
//            $form->image('business_apply.img_details2','商家详情照2')->uniqueName()->accept('jpg,png,gif,jpeg', 'image/*')->disk('oss')->move('/business/category')->autoUpload();
//            $form->image('business_apply.img_details3','商家详情照3')->uniqueName()->accept('jpg,png,gif,jpeg', 'image/*')->disk('oss')->move('/business/category')->autoUpload();

            $form->display('created_at');
            $form->display('updated_at');
            });

        });
    }



    protected function detail($id)
    {
        return Show::make($id, new BusinessData(['user','cate','province','city','district','business_apply','userIdImg']), function (Show $show) {
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
                $show->width(3)->field('user_id_img.img_hold','身份证手持照')->image(env('OSS_URL'),50,50);

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
