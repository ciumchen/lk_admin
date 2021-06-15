<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\DailyImportOrderStatistic;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class DailyImportOrderStatisticController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new DailyImportOrderStatistic(), function (Grid $grid) {
//            $grid->model()->where('line_up',1);
            $grid->model()->orderBy('id','desc');
            $grid->column('id')->sortable();
            $grid->column('day')->display(function () {
                return (date('Y-m-d',$this->day));
            });
//            $grid->column('count_lk');
            $grid->column('count_profit_price');
            $grid->column('price_5');
            $grid->column('price_10');
            $grid->column('price_20');
            $grid->column('price_all')->display(function (){
                return $this->price_5+$this->price_10+$this->price_20;
            });
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            // 禁用创建按钮
            $grid->disableCreateButton();
            // 禁用编辑按钮
            $grid->disableEditButton();
            // 禁用删除按钮
            $grid->disableDeleteButton();
            // 禁用显示按钮
            $grid->disableViewButton();
            $grid->disableBatchDelete();
            $grid->disableActions();

            $grid->perPages([20, 50, 100, 200, 500]);

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
//    protected function detail($id)
//    {
//        return Show::make($id, new DailyImportOrderStatistic(), function (Show $show) {
//            $show->field('id');
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
//    protected function form()
//    {
//        return Form::make(new DailyImportOrderStatistic(), function (Form $form) {
//            $form->display('id');
//
//            $form->display('created_at');
//            $form->display('updated_at');
//        });
//    }
}
