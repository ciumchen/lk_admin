<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\CityData;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class CityDataController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new CityData(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('code');
            $grid->column('p_code');

            $grid->disableViewButton();

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
        return Show::make($id, new CityData(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('code');
            $show->field('p_code');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new CityData(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('code');
            $form->text('p_code');
        });
    }
}
