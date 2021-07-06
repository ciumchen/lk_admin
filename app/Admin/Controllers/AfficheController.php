<?php

namespace App\Admin\Controllers;

use App\Models\Affiche;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use Illuminate\Database\Eloquent\Model;

class AfficheController extends AdminController {
    protected $model;
    
    public function __construct()
    {
        $this->model = new Affiche();
    }
    
    /**
     * Description:
     *
     * @return \Dcat\Admin\Grid
     * @author lidong<947714443@qq.com>
     * @date   2021/6/30 0030
     */
    public function grid()
    : Grid
    {
        return Grid::make(
            $this->model,
            function (Grid $grid) {
                $grid->model()->orderBy('id', 'desc');
                $grid->column('id');
                $grid->column('title');
                $grid->column('created_at');
                $grid->column('updated_at');
            }
        );
    }
    
    public function form()
    {
        return Form::make(
            $this->model,
            function (Form $form) {
                $form->display('id');
                $form->text('title');
                $form->textarea('content');
                $form->display('created_at');
                $form->display('updated_at');
            }
        );
    }
    
    /**
     * Description:
     *
     * @param  int  $id
     *
     * @return \Dcat\Admin\Show
     * @author lidong<947714443@qq.com>
     * @date   2021/6/30 0030
     */
    public function detail(int $id)
    : Show
    {
        return Show::make(
            $id,
            $this->model,
            function (Show $show) {
                $show->field('id');
                $show->field('title');
                $show->field('content');
                $show->field('created_at');
                $show->field('updated_at');
            }
        );
    }
}
