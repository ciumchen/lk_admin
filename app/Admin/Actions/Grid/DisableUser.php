<?php

namespace App\Admin\Actions\Grid;

use Dcat\Admin\Widgets\Modal;
use Dcat\Admin\Grid\RowAction;

class DisableUser extends RowAction
{
    /**
     * @return string
     */
    protected $title = '封禁用户';
    public function render()
    {

        // 实例化表单类并传递自定义参数
        $form = \App\Admin\Forms\DisableUser::make()->payload([
            'id' => $this->getKey(),
            'phone' => $this->row->phone,
        ]);

        return Modal::make()
            ->lg()
            ->title($this->title)
            ->body($form)
            ->button($this->title);
    }
}
