<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Test
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Test newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Test newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Test query()
 * @mixin \Eloquent
 */
class Test extends Model
{
	use HasDateTimeFormatter;


    protected $table = 'test';

    public function testinfo(){
        return $this->with( 'test')->where('id=1');
    }

}
