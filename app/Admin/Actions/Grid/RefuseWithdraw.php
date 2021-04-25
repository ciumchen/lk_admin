<?php

namespace App\Admin\Actions\Grid;

use Dcat\Admin\Grid\RowAction;
use Dcat\Admin\Widgets\Modal;

class RefuseWithdraw extends RowAction
{
    /**
     * @return string
     */
	protected $title = '<i class="fa fa-ban"> 拒绝提现</i>';
    public function render()
    {
        // 实例化表单类并传递自定义参数
        $form = \App\Admin\Forms\RefuseWithdraw::make()->payload(['id' => $this->getKey()]);

        return Modal::make()
            ->lg()
            ->title($this->title)
            ->body($form)
            ->button($this->title);
    }
}
