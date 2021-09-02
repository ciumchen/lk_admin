<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\EverydayExchangeietsLog;
use App\Console\Commands\exchangeIets;
use App\Models\OrderIntegralLkDistribution;
use App\Models\Users;
use App\Services\RebateService;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use App\Models\EverydayExchangeietsLog as ExchangeietsLogModel;
class EverydayExchangeietsLogController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new EverydayExchangeietsLog(), function (Grid $grid) {
            $grid->header(function ($collection) {
                $today = date('Y-m-d', time());
                $todayFhData = ExchangeietsLogModel::where('day', $today)->first();
                if (empty($todayFhData)){
                    $state = 1;
                }else{
                    if ($todayFhData->status!=2){
                        $state = 1;
                    }else{
                        $state = 0;
                    }
                }
//                dd($todayFhData->toArray());
                if ($state == 1){
                if (Admin::user()->id == 1 || Admin::user()->id == 2) {
                    $buttoncss = 'background: #5c6bc6;font-weight: 600;color: #fff;margin-bottom: 4px;display: inline;
padding: .24em .6em .34em;line-height: 1;text-align: center;white-space: nowrap;vertical-align: baseline;border-radius: .25em;cursor: pointer;box-sizing: border-box;';

                    return "<div style='margin: 10px;text-align: right'>
                        <a href=\"javascript:if(confirm('确实要分红吗?'))location='sdEveryDayIetsFh'\"><span style='$buttoncss'>今日资产手动分红</span></a>
                        </div>";
                }}
            });
            $grid->column('id')->sortable();
            $grid->column('day');
            $grid->column('status')->using(EverydayExchangeietsLog::$statusText)->label(EverydayExchangeietsLog::$statusColor);
            $grid->column('type');
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

//            $grid->filter(function (Grid\Filter $filter) {
//                $filter->equal('id');
//
//            });
        });
    }

    public function sdEveryDayIetsFh(){
        (new RebateService())->exchagneIets();
        return redirect('admin/exchangeiets_log');

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
//        return Show::make($id, new EverydayExchangeietsLog(), function (Show $show) {
//            $show->field('id');
//            $show->field('day');
//            $show->field('status');
//            $show->field('type');
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
//        return Form::make(new EverydayExchangeietsLog(), function (Form $form) {
//            $form->display('id');
//            $form->text('day');
//            $form->text('status');
//            $form->text('type');
//
//            $form->display('created_at');
//            $form->display('updated_at');
//        });
//    }
}
