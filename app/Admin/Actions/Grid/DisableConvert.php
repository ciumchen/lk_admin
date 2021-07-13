<?php

namespace App\Admin\Actions\Grid;

use Dcat\Admin\Widgets\Modal;
use Dcat\Admin\Grid\RowAction;

class DisableConvert extends RowAction
{
    /**
     * @return string
     */
    protected $title = '更新状态';
    public function render()
    {

        // 实例化表单类并传递自定义参数
        $form = \App\Admin\Forms\DisableConvert::make()->payload([
            'id' => $this->getKey(),
            'phone' => $this->row->phone,
            'user_name' => $this->row->user_name,
            'price' => $this->row->price,
        ]);

        return Modal::make()
            ->lg()
            ->title($this->title)
            ->body($form)
            ->button($this->title);
    }
}
