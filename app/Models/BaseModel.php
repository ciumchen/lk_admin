<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;
    
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->appends = array_merge($this->appends, $this->appends_time);
    }
    
    protected $appends_time = ['create_time', 'update_time'];
    
    /**
     * Description: 格式化时间字段
     *
     *
     * @return mixed|string
     * @author lidong<947714443@qq.com>
     * @date   2021/8/10 0010
     */
    public function getCreateTimeAttribute($value)
    {
        if (isset($this->attributes[ self::CREATED_AT ]) && !empty($this->attributes[ self::CREATED_AT ])) {
            $value = Carbon::createFromFormat(
                'Y-m-d\TH:i:s.vv\Z',
                date('Y-m-d\TH:i:s.vv\Z', strtotime($this->attributes[ self::CREATED_AT ]))
            )
                           ->format('Y-m-d H:i:s');
        }
        return $value;
    }
    
    /**
     * Description: 格式化时间字段
     *
     *
     * @return mixed|string
     * @author lidong<947714443@qq.com>
     * @date   2021/8/10 0010
     */
    public function getUpdateTimeAttribute($value)
    {
        if (isset($this->attributes[ self::UPDATED_AT ]) && !empty($this->attributes[ self::UPDATED_AT ])) {
            $value = Carbon::createFromFormat(
                'Y-m-d\TH:i:s.vv\Z',
                date('Y-m-d\TH:i:s.vv\Z', strtotime($this->attributes[ self::CREATED_AT ]))
            )
                           ->format('Y-m-d H:i:s');
        }
        return $value;
    }
}
