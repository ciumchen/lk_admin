<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\BmRechargeOrder;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use App\Models\BmRechargeOrder as BmModel;

class BmRechargeOrderController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $_this = $this;
        return Grid::make(new BmRechargeOrder(), function (Grid $grid) use ($_this)
        {
            $grid->model()->orderByDesc('orderTimeFull');
            $grid->column('billId');
            $grid->column('rechargeAccount');
//            $grid->column('classType');
            $grid->column('facePrice');
            $grid->column('saleAmount');
            $grid->column('orderCost');
//            $grid->column('itemCost');
            $grid->column('itemName');
            $grid->column('itemNum');
//            $grid->column('operateTime');
//            $grid->column('orderProfit');
//            $grid->column('orderTime');
            $grid->column('orderTimeFull');
            $grid->column('payState')->using(BmModel::$payStateText)->label(BmModel::$payStateStyle);
            $grid->column('rechargeState')->using(BmModel::$rechargeStateText)->label(BmModel::$rechargeStateStyle);
            $grid->column('revokeMessage')->limit(20);
            $grid->column('supUserId');
            $_this->disableButton($grid);
            $_this->filterSearch($grid);
            $_this->exportExcel($grid);
        });
    }
    
    /**
     * Make a show builder.
     *
     * @param  mixed  $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new BmRechargeOrder(), function (Show $show)
        {
            $show->field('id');
            $show->field('billId');
            $show->field('classType');
            $show->field('facePrice');
            $show->field('itemCost');
            $show->field('itemName');
            $show->field('itemNum');
            $show->field('operateTime');
            $show->field('orderCost');
            $show->field('orderProfit');
            $show->field('orderTime');
            $show->field('orderTimeFull');
            $show->field('payState');
            $show->field('rechargeAccount');
            $show->field('rechargeState');
            $show->field('revokeMessage');
            $show->field('saleAmount');
            $show->field('supUserId');
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
        return Form::make(new BmRechargeOrder(), function (Form $form)
        {
            $form->display('id');
            $form->text('billId');
            $form->text('classType');
            $form->text('facePrice');
            $form->text('itemCost');
            $form->text('itemName');
            $form->text('itemNum');
            $form->text('operateTime');
            $form->text('orderCost');
            $form->text('orderProfit');
            $form->text('orderTime');
            $form->text('orderTimeFull');
            $form->text('payState');
            $form->text('rechargeAccount');
            $form->text('rechargeState');
            $form->text('revokeMessage');
            $form->text('saleAmount');
            $form->text('supUserId');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
    
    /**
     * Description:??????????????????
     *
     * @param  \Dcat\Admin\Grid  $grid
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/18 0018
     */
    public function disableButton(Grid $grid)
    {
        $grid->disableActions();
        // ??????????????????
        $grid->disableCreateButton();
        // ??????????????????
        $grid->disableEditButton();
        // ??????????????????
        $grid->disableDeleteButton();
        // ??????????????????
        $grid->disableViewButton();
        $grid->disableBatchDelete();
    }
    
    /**
     * Description:????????????
     *
     * @param  \Dcat\Admin\Grid  $grid
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/18 0018
     */
    public function filterSearch(Grid $grid)
    {
        $grid->filter(function (Grid\Filter $filter)
        {
            $filter->equal('billId');
            $filter->equal('rechargeAccount');
            $filter->equal('rechargeState')->select(BmModel::$rechargeStateText);
            $filter->between('orderTimeFull')->date();
        });
    }
    
    /**
     * Description:??????
     *
     * @param  \Dcat\Admin\Grid  $grid
     *
     * @author lidong<947714443@qq.com>
     * @date   2021/8/18 0018
     */
    public function exportExcel(Grid $grid)
    {
        $grid->export()->titles($this->getTitles())->rows(function (array $rows)
        {
            foreach ($rows as &$row) {
                $row[ 'payState' ] = BmModel::$payStateText[ $row[ 'payState' ] ];
                $row[ 'rechargeState' ] = BmModel::$rechargeStateText[ $row[ 'rechargeState' ] ];
            }
            return $rows;
        })->filename('????????????-'.date('YmdHis'));
    }
    
    /**
     * Description:?????????????????????????????????
     *
     * @return array
     * @author lidong<947714443@qq.com>
     * @date   2021/8/18 0018
     */
    public function getTitles()
    : array
    {
        return [
            'billId'          => admin_trans_field('billId'),
            //            'classType'       => admin_trans_field('classType'),
            'facePrice'       => admin_trans_field('facePrice'),
            //            'itemCost'        => admin_trans_field('itemCost'),
            'itemName'        => admin_trans_field('itemName'),
            'itemNum'         => admin_trans_field('itemNum'),
            //            'operateTime'     => admin_trans_field('operateTime'),
            'orderCost'       => admin_trans_field('orderCost'),
            //            'orderProfit'     => admin_trans_field('orderProfit'),
            //            'orderTime'       => admin_trans_field('orderTime'),
            'orderTimeFull'   => admin_trans_field('orderTimeFull'),
            'payState'        => admin_trans_field('payState'),
            'rechargeAccount' => admin_trans_field('rechargeAccount'),
            'rechargeState'   => admin_trans_field('rechargeState'),
            'revokeMessage'   => admin_trans_field('revokeMessage'),
            'saleAmount'      => admin_trans_field('saleAmount'),
            'supUserId'       => admin_trans_field('supUserId'),
        ];
    }
}
