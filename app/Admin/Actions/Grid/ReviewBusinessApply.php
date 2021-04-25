<?php

namespace App\Admin\Actions\Grid;


use Dcat\Admin\Grid\RowAction;
use Dcat\Admin\Widgets\Modal;
class ReviewBusinessApply extends RowAction
{
    /**
     * @return string
     */
	protected $title = '申请审核';
    public function render()
    {

        // 实例化表单类并传递自定义参数
        $form = \App\Admin\Forms\ReviewBusinessApply::make()->payload([
            'id' => $this->getKey(),
            'uid' => $this->row->uid,
            'status' => $this->row->status,
            'remark' => $this->row->remark,
        ]);

        return Modal::make()
            ->lg()
            ->title($this->title)
            ->body($form)
            ->button($this->title);
    }

}
