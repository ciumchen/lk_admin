<?php

namespace App\Admin\Actions\Grid;

use Dcat\Admin\Widgets\Modal;
use Dcat\Admin\Grid\RowAction;

class DisableGather extends RowAction
{
    /**
     * @return string
     */
    protected $title = '结束拼团';
    public function render()
    {
        // 实例化表单类并传递自定义参数
        $form = \App\Admin\Forms\DisableGather::make()->payload([
            'id' => $this->getKey(),
            'status' => $this->row->status,
        ]);

        return Modal::make()
            ->lg()
            ->title($this->title)
            ->body($form)
            ->button($this->title);
    }
}
