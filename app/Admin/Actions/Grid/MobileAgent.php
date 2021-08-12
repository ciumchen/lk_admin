<?php

namespace App\Admin\Actions\Grid;

use Dcat\Admin\Grid\RowAction;
use Dcat\Admin\Widgets\Modal;

class MobileAgent extends RowAction
{
    /**
     * @return string
     */
	protected $title = '<i class="fa fa-check"> 修改充值状态</i>';
    public function render()
    {
        // 实例化表单类并传递自定义参数
        $form = \App\Admin\Forms\MobileAgent::make()->payload(['id' => $this->getKey()]);

        return Modal::make()
            ->lg()
            ->title($this->title)
            ->body($form)
            ->button($this->title);
    }
}
