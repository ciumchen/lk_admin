<?php

namespace App\Admin\Actions\Grid;

use Dcat\Admin\Grid\RowAction;
use Dcat\Admin\Widgets\Modal;
use App\Admin\Forms\ManyMobile as ManyMobileForms;
class ManyMobile extends RowAction
{
    /**
     * @return string
     */
	protected $title = '<i class="fa fa-check"> 修改充值状态</i>';
    public function render()
    {
        // 实例化表单类并传递自定义参数
        $form = ManyMobileForms::make()->payload(['id' => $this->getKey()]);

        return Modal::make()
            ->lg()
            ->title($this->title)
            ->body($form)
            ->button($this->title);
    }
}
