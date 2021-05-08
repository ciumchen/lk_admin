<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\DisableBusiness;
use App\Admin\Actions\Grid\EnableBusiness;

use App\Admin\Actions\Grid\LimitPriceBusiness;
use App\Admin\Repositories\BusinessData;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Controllers\AdminController;

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
            $grid->column('business_apply.img','营业执照')->display(function ($v){
                if ($v){
                    return "<a href='".env('OSS_URL').$v."' target='_blank'>营业执照</a>";
                }else{
                    return "没有上传图片";
                }

            });
            $grid->column('business_apply.img2','商家头图')->display(function ($v){
                if ($v){
                    return "<a href='".env('OSS_URL').$v."' target='_blank'>商家头图</a>";
                }else{
                    return "没有上传图片";
                }

            });
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
            $grid->disableViewButton();
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
}
