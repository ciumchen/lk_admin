<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Test;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use Illuminate\Support\Facades\DB;

class TestController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Test(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('sex');
            $grid->column('age');
            $grid->column('email');
//            $grid->column('created_at');
//            $grid->column('updated_at')->sortable();

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
        return Show::make($id, new Test(), function (Show $show) {
            $show->field('id');
            $show->field('id');
            $show->field('name');
            $show->field('sex');
            $show->field('age');
            $show->field('email');
//            $show->field('created_at');
//            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Test(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('email');
//
//            $form->display('created_at');
//            $form->display('updated_at');
        });
    }

    public function mytest(){
        echo 'mytest-2021年4月19日 14:23:30';
        $obj = new \App\Models\Test();
//        var_dump($obj->testinfo());


        $re = \App\Models\Test::with(['invite']);
        dd($re);

    }

    public function update_sjtt(){
        set_time_limit(0);
        $data = DB::table('business_data')->where('business_apply_id',0)->get()->toArray();
//        echo '<pre>';
//        var_dump($data);
        try{
            foreach ($data as $k=>$v){
                $re = DB::table('business_apply')->where('status',2)->where('uid',$v->uid)->first('id');
    //            var_dump($re->id);echo '<br/>';
    //
    //            echo  'uid:'.$v->uid.'=====business_data:'.$v->id.'==== business_apply:'.$re->id;
    //            echo '<br/>';

                DB::table('business_data')->where('id',$v->id)->update(['business_apply_id'=>$re->id]);

            }

        }catch (PDOException $e) {
            report($e);
            throw new LogicException('更新失败');
        } catch (Exception $e) {
            throw $e;
        }




    }

    //更新order表支付状态、订单异常
    public function update_order_ddyc(){
        set_time_limit(0);
        $data = DB::table('order')->where('pay_status',null)->get('id')->toArray();
        echo '修改order表订单异常';
//        var_dump($data);
//        echo '<pre>';
//        var_dump($data);exit;
        try{
            foreach ($data as $k=>$v){
                $re = DB::table('order')->where('id',$v->id)->update(['pay_status'=>'ddyc']);
                var_dump($re);
            }

        }catch (PDOException $e) {
            report($e);
            throw new LogicException('更新失败');
        } catch (Exception $e) {
            throw $e;
        }






    }



}
