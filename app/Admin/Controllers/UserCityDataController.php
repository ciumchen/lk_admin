<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\UserCityData;
use App\Models\CityData;
use App\Models\CityNode;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use Illuminate\Http\Request;
class UserCityDataController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new UserCityData(), function (Grid $grid) {
            $grid->model()->with(['province', 'city', 'district']);
            $grid->model()->orderBy('id','desc');
            $grid->column('id')->sortable();

            $grid->column('uid');

            $grid->column('province.name','省');
            $grid->column('city.name','市');
            $grid->column('district.name','区');

            $grid->column('lng');
            $grid->column('lat');
            $grid->column('address');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            // 禁用创建按钮
            $grid->disableCreateButton();
            // 禁用编辑按钮
//            $grid->disableEditButton();
            // 禁用删除按钮
//            $grid->disableDeleteButton();
            // 禁用显示按钮
            $grid->disableViewButton();
            $grid->disableBatchDelete();
//            $grid->disableActions();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

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
        return Show::make($id, new UserCityData(), function (Show $show) {
            $show->field('id');
            $show->field('address');
            $show->field('city_id');
            $show->field('district_id');
            $show->field('lat');
            $show->field('lng');
            $show->field('province_id');
            $show->field('uid');
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
        return Form::make(new UserCityData(['province', 'city', 'district']), function (Form $form) {
            $form->display('id');
            $form->display('uid');
            $city = CityData::where('p_code', 0)->get();
            foreach($city as $v){
                $data[$v->id] = $v->name;

            }
            $script = <<<EOT
$(".province").trigger('change');
EOT;
            Admin::script($script);
            $form->select('province_id', '省份')->options($data)->load('city_id', '/get-user-city')->required();
            $form->select('city_id', '城市')->load('district_id', '/get-user-city');
            $form->select('district_id', '地区');

            //保存前回调
            $form->text('address');
            $form->text('lat');
            $form->text('lng');
            $form->display('created_at');
            $form->display('updated_at');
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
        $city = CityData::where('pid', $q)->get();
        $data[0]['text'] = '请选择';
        $data[0]['id'] = 0;

        foreach($city as $key=>$v){
            $data[$key+1]['text'] = $v->name;
            $data[$key+1]['id'] = $v->id;
        }

        return $data;
    }
}
