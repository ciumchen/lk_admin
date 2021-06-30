<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Affiche
 *
 * @property int                             $id
 * @property string                          $title   公告标题
 * @property string|null                     $content 公告内容
 * @property int                             $is_del  标记删除
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Affiche newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Affiche newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Affiche query()
 * @method static \Illuminate\Database\Eloquent\Builder|Affiche whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiche whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiche whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiche whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiche whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiche whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Affiche extends Model
{
    
    use HasFactory;
    
    protected $table = 'affiche';
    
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
