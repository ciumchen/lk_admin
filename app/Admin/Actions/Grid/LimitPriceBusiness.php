<?php

namespace App\Admin\Actions\Grid;

use Dcat\Admin\Widgets\Modal;
use Dcat\Admin\Grid\RowAction;

class LimitPriceBusiness extends RowAction
{
    /**
     * @return string
     */
    protected $title = '商家单日限额';
    public function render()
    {

        // 实例化表单类并传递自定义参数
        $form = \App\Admin\Forms\LimitPriceBusiness::make()->payload([
            'id' => $this->getKey(),
            'uid' => $this->row->uid,
        ]);

        return Modal::make()
            ->lg()
            ->title($this->title)
            ->body($form)
            ->button($this->title);
    }
}
