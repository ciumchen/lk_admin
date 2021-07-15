<?php

namespace App\Admin\Repositories;

use App\Models\ConvertLogs as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Convert extends EloquentRepository
{
    
    protected $eloquentClass = Model::class;
    
    /* 订单类型 */
    const CREATE_TYPE_PHONE       = 1; /* 兑换话费 */
    const CREATE_TYPE_MEITUAN      = 2; /* 兑换余额（美团） */
    /* 订单状态[第三方] */
    const STATUS_DEFAULT  = 0; /* 默认状态[待兑换] */
    const STATUS_PROGRESS = 1; /* 处理中 */
    const STATUS_SUCCESS  = 2; /* 成功 */
    const STATUS_FAIL     = 3; /* 失败 */
    
    /**
     * @var string[] 订单类型文字
     */
    static public $createType_text = [
        self::CREATE_TYPE_PHONE   => '兑换话费',
        self::CREATE_TYPE_MEITUAN => '兑换余额（美团）',
    ];
    
    /**
     * @var string[] 订单状态对应文字
     */
    public static $statusTexts = [
        self::STATUS_DEFAULT  => '待兑换',
        self::STATUS_PROGRESS => '处理中',
        self::STATUS_SUCCESS  => '成功',
        self::STATUS_FAIL     => '失败',
    ];
    
    /**
     * @var string[] 订单状态对应样式
     */
    public static $statusLabelStyle = [
        self::STATUS_DEFAULT => 'primary',
        self::STATUS_SUCCESS => 'success',
        self::STATUS_FAIL    => 'danger',
    ];
}