<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminBaseModel extends Model
{
    use HasFactory;
    
    public function getCreatedAtAttribute($value)
    {
        if ($value) {
            $value = Carbon::createFromFormat(
                'Y-m-d\TH:i:s.vv\Z',
                date('Y-m-d\TH:i:s.vv\Z', strtotime($value))
            )
                           ->format('Y-m-d H:i:s');
        }
        return $value;
    }
    
    public function getUpdatedAtAttribute($value)
    {
        if ($value) {
            $value = Carbon::createFromFormat(
                'Y-m-d\TH:i:s.vv\Z',
                date('Y-m-d\TH:i:s.vv\Z', strtotime($value))
            )
                           ->format('Y-m-d H:i:s');
        }
        return $value;
    }
}
