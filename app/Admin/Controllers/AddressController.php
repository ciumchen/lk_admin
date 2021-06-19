<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Address;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class AddressController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Address(), function (Grid $grid) {
            $grid->model()->orderBy('id','desc');
            $grid->model()->with(['user']);
            $grid->column('id')->sortable();
            $grid->column('uid');
            $grid->column('user.phone','用户');
            $grid->column('address')->display(function ($v){
                return "<a href='https://qkiscan.cn/address/".$v."' target='_blank'>".$v."</a>";
            });
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->disableEditButton();
            $grid->disableCreateButton();
            $grid->disableViewButton();
            $grid->disableBatchDelete();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

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
        return Form::make(new Address(), function (Form $form) {
            $form->display('id');
            $form->text('uid');
            $form->text('address');
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
