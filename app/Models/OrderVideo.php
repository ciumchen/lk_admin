<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrderVideo
 *
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo query()
 * @mixin \Eloquent
 * @property int                             $id
 * @property string                          $order_no    订单号
 * @property int                             $user_id     充值用户ID
 * @property string                          $account     充值账号
 * @property int                             $order_id    订单表ID
 * @property string                          $money       充值金额
 * @property string                          $trade_no    接口方返回单号
 * @property int                             $pay_status  平台订单付款状态:0未付款,1已付款
 * @property int                             $status      充值状态:0充值中,1成功,9撤销
 * @property string                          $goods_title 商品名称
 * @property string                          $item_id     会员充值 标准商品编号
 * @property int                             $create_type
 *           订单类型:1优酷会员,2迅雷会员,3土豆会员,4爱奇艺会员,5乐视会员,6好莱坞会员,7芒果TV移动PC端会员,8芒果TV全屏会员,9搜狐会员,10腾讯会员,
 * @property \Illuminate\Support\Carbon|null $created_at  创建时间
 * @property \Illuminate\Support\Carbon|null $updated_at  更新时间
 * @property string                          $channel     下单渠道:bm斑马力方,ww万维易源
 * @property string|null                     $card_list   订单卡密信息
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereCardList($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereCreateType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereGoodsTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereOrderNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo wherePayStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereTradeNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderVideo whereUserId($value)
 * @property-read \App\Models\Order          $orders
 */
class OrderVideo extends Model
{
    
    use HasFactory;
    
    /* 订单渠道标识 */
    const CHANNEL_WANWEI      = 'ww'; /* 万维易源渠道标识 */
    const CHANNEL_BANMALIFANG = 'bm'; /* 斑马力方渠道标识 */
    /* 订单类型状态 */
    const CREATE_TYPE_YOUKU       = '1'; /* 优酷会员 */
    const CREATE_TYPE_XUNLEI      = '2'; /* 迅雷会员 */
    const CREATE_TYPE_TUDOU       = '3'; /* 土豆会员 */
    const CREATE_TYPE_IQIYI       = '4'; /* 爱奇艺会员 */
    const CREATE_TYPE_LESHI       = '5'; /* 乐视会员 */
    const CREATE_TYPE_HOLLYWOOD   = '6'; /* 好莱坞会员 */
    const CREATE_TYPE_MONGO_PC_TV = '7'; /* 芒果TV移动PC端会员 */
    const CREATE_TYPE_MONGO_TV    = '8'; /* 芒果TV全屏会员 */
    const CREATE_TYPE_SOHU        = '9'; /* 搜狐会员 */
    const CREATE_TYPE_TENCENT     = '10'; /* 腾讯会员 */
    /* 第三方订单状态 */
    const STATUS_DEFAULT = '0'; /* 默认状态[未获取] */
    const STATUS_SUCCESS = '1'; /* 获取成功 */
    const STATUS_FAIL    = '2'; /* 获取异常 */
    const STATUS_CANCEL  = '9'; /* 撤销 */
    /**
     * @var string[] 渠道标识对应文字
     */
    public static $channel_text = [
        self::CHANNEL_WANWEI      => '万维易源',
        self::CHANNEL_BANMALIFANG => '斑马力方',
    ];
    
    /**
     * @var string[] 订单类型对应文字
     */
    public static $createTypeTexts = [
        self::CREATE_TYPE_YOUKU       => '优酷会员',
        self::CREATE_TYPE_XUNLEI      => '迅雷会员',
        self::CREATE_TYPE_TUDOU       => '土豆会员',
        self::CREATE_TYPE_IQIYI       => '爱奇艺会员',
        self::CREATE_TYPE_LESHI       => '乐视会员',
        self::CREATE_TYPE_HOLLYWOOD   => '好莱坞会员',
        self::CREATE_TYPE_MONGO_PC_TV => '芒果TV移动PC端会员',
        self::CREATE_TYPE_MONGO_TV    => '芒果TV全屏会员',
        self::CREATE_TYPE_SOHU        => '搜狐会员',
        self::CREATE_TYPE_TENCENT     => '腾讯会员',
    ];
    
    /**
     * @var string[] 订单状态对应文字
     */
    public static $statusTexts = [
        self::STATUS_DEFAULT => '未获取',
        self::STATUS_SUCCESS => '获取成功',
        self::STATUS_FAIL    => '获取异常',
        self::STATUS_CANCEL  => '撤销',
    ];
    
    protected $table = 'order_video';
    
    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    
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
