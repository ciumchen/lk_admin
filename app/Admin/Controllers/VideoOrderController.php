<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\VerifyOrder;
use App\Admin\Repositories\Order;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\Admin;

class VideoOrderController extends AdminController
{
    
    //
    public function grid()
    {
        $Order = new Order();
        return Grid::make($Order, function (Grid $grid) {
            $hehe = $grid->model()->orderBy('id', 'desc');
            dump($hehe);
        });
    }
    
    public function detail()
    {
    }
    
    protected function form()
    {
    }
}
