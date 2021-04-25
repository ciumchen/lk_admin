<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
	use HasDateTimeFormatter;


    protected $table = 'test';

    public function testinfo(){
        return $this->with( 'test')->where('id=1');
    }

}
