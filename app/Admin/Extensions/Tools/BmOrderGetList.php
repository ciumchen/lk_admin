<?php

namespace App\Admin\Extensions\Tools;

use Dcat\Admin\Admin;
use Dcat\Admin\Grid\Tools\AbstractTool;

class BmOrderGetList extends AbstractTool
{
    protected function script()
    {
        $url = request()->fullUrlWithQuery(['gender' => '_gender_']);
        return <<<JS
$('input:radio.user-gender').change(function () {
    var url = "$url".replace('_gender_', $(this).val());

    Dcat.reload(url);
});
JS;
    }
    
    public function render()
    {
        Admin::script($this->script());
        $options = [
            'all' => 'All',
            'm'   => 'Male',
            'f'   => 'Female',
        ];
        return view('admin.tools.bmList', compact('options'));
    }
}
