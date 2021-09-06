<?php

namespace App\Admin\Actions\Grid;

use Dcat\Admin\Grid\RowAction;
use Dcat\Admin\Widgets\Modal;

class GatherOrder extends RowAction
{
    /**
     * @return string
     */
	protected $title = '<i class="fa fa-check"> 审核订单</i>';
    public function render()
    {
        // 实例化表单类并传递自定义参数
        $form = \App\Admin\Forms\GatherOrder::make()->payload(['id' => $this->getKey()]);

        return Modal::make()
            ->lg()
            ->title($this->title)
            ->body($form)
            ->button($this->title);
    }
}
