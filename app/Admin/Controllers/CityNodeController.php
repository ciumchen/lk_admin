<?php

namespace App\Admin\Controllers;


use App\Models\CityData;
use App\Models\CityNode;
use App\Models\User;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

use Illuminate\Http\Request;

class CityNodeController extends AdminController
{

    protected $isAddress = false;//是否更改地址

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new \App\Admin\Repositories\CityNode(['cityDataProvince', 'cityDataCity', 'cityDataDistrict']), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('uid');
            $grid->column('name');
            $grid->column('cityDataProvince.name', '省');
            $grid->column('cityDataCity.name', '城市');
            $grid->column('cityDataDistrict.name', '区');

            $grid->column('user_number');
            $grid->column('new_user_number');
            $grid->column('user_active');
            $grid->column('total_consumption');
            $grid->column('yesterday_consumption');
            $grid->column('status')->display(function($v){
                return CityNode::$statusLabel[$v];
            });;
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
            $grid->actions(function ($actions) {
                $actions->disableView();

            });
            $grid->filter(function ($filter) {
                $filter->equal('uid', 'UID');
                $filter->equal('user.nickname', '用户名');
                $filter->like('name', '站点名');
            });
            $grid->disableBatchDelete();
        });
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new CityNode(), function (Form $form) {
            $form->display('id');
            $form->text('uid');
            $form->text('name');
            $city = CityData::where('p_code', 0)->get();
            foreach($city as $v){
                $data[$v->code] = $v->name;

            }
$script = <<<EOT
$(".province").trigger('change');
EOT;
            Admin::script($script);
            $form->select('province', '省份')->options($data)->load('city', '/get-city')->required();
            $form->select('city', '城市')->load('district', '/get-city');
            $form->select('district', '地区');

            $form->radio('status')->options(CityNode::$statusLabel)->default(1);
            $form->display('created_at');
            $form->display('updated_at');

            //保存前回调
            $form->saving(function (Form $form) {

                $form->uid = $form->uid!=0?$form->uid:null;

                if(!$form->province)
                    throw new \Exception('请至少选择省份');

                $form->district = $form->district==0?null:$form->district;
                $form->city = $form->city==0?null:$form->city;
                $form->province = $form->province==0?null:$form->province;

                //是否对站点地址有做修改
                if($form->model()->district != $form->district || $form->model()->city != $form->city || $form->model()->province != $form->province)
                    $this->isAddress = true;

                if($form->model()->uid != $form->uid && CityNode::whereUid($form->uid)->exists())
                    return $form->error('省站长不能同时是其他节点站长~');


                if(!$form->city && !$form->district && CityNode::whereUid($form->uid)->where(function($query){
                        return $query->orWhereNotNull('city')->orWhereNotNull('district');
                    })->exists())
                    return $form->error('其他站长不能同时是省节点站长~');


                if($this->isAddress == true && CityNode::where([
                        ['province',$form->province],
                        ['city',$form->city],
                        ['district',$form->district],
                    ])->exists()){
                    throw new \Exception('节点已存在');
                }

            });




        });
    }

    /**获取地区
     * @param Request $request
     * @return array
     */
    public function getCity(Request $request){
        $q = $request->input('q');
        if($q == 0)
            return [];
        $city = CityData::where('p_code', $q)->get();
        $data[0]['text'] = '请选择';
        $data[0]['id'] = 0;

        foreach($city as $key=>$v){
            $data[$key+1]['text'] = $v->name;
            $data[$key+1]['id'] = $v->code;
        }

        return $data;
    }
}
