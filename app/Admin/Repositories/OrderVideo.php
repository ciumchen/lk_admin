<?php

namespace App\Admin\Repositories;

use App\Models\OrderVideo as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class OrderVideo extends EloquentRepository
{
    
    protected $eloquentClass = Model::class;
    
    const CHANNEL_WANWEI      = 'ww'; /* 万维易源渠道标识 */
    const CHANNEL_BANMALIFANG = 'bm'; /* 斑马力方渠道标识 */
    /* 订单类型 */
    const CREATE_TYPE_YOUKU       = 1; /* 优酷会员 */
    const CREATE_TYPE_XUNLEI      = 2; /* 迅雷会员 */
    const CREATE_TYPE_TUDOU       = 3; /* 土豆会员 */
    const CREATE_TYPE_IQIYI       = 4; /* 爱奇艺会员 */
    const CREATE_TYPE_LESHI       = 5; /* 乐视会员 */
    const CREATE_TYPE_HOLLYWOOD   = 6; /* 好莱坞会员 */
    const CREATE_TYPE_MONGO_PC_TV = 7; /* 芒果TV移动PC端会员 */
    const CREATE_TYPE_MONGO_TV    = 8; /* 芒果TV全屏会员 */
    const CREATE_TYPE_SOHU        = 9; /* 搜狐会员 */
    const CREATE_TYPE_TENCENT     = 10; /* 腾讯会员 */
    /* 订单状态[第三方] */
    const STATUS_DEFAULT = '0'; /* 默认状态[未获取] */
    const STATUS_SUCCESS = '1'; /* 获取成功 */
    const STATUS_FAIL    = '2'; /* 获取异常 */
    const STATUS_CANCEL  = '9'; /* 撤销 */
    /**
     * @var string[] 渠道标识对应文字
     */
    static public $channel_text = [
        self::CHANNEL_WANWEI      => '万维易源',
        self::CHANNEL_BANMALIFANG => '斑马力方',
    ];
    
    /**
     * @var string[] 订单类型文字
     */
    static public $createType_text = [
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
        //        self::STATUS_CANCEL  => '撤销',
    ];
    
    /**
     * @var string[] 订单状态对应样式
     */
    public static $statusLabelStyle = [
        self::STATUS_DEFAULT => 'primary',
        self::STATUS_SUCCESS => 'success',
        self::STATUS_FAIL    => 'danger',
        //        self::STATUS_CANCEL  => 'dark',
    ];
}