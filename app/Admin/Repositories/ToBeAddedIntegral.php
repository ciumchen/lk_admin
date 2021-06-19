<?php

namespace App\Admin\Repositories;

use App\Models\ToBeAddedIntegral as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ToBeAddedIntegral extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
    const STATUS_DEFAULT = 1;
    const STATUS_SUCCESS = 2;
    const STATUS_REFUSED = 3;

    const PAY_STATUS_AWAIT = 'await';
    const PAY_STATUS_PENDING = 'pending';
    const PAY_STATUS_SUCCEEDED = 'succeeded';
    const PAY_STATUS_FAILED = 'failed';
    const PAY_STATUS_DDYC = 'ddyc';

    const LD_ORDER_SELECT1 = '录单';
    const LD_ORDER_SELECT2 = '话费';
    const LD_ORDER_SELECT3 = '油卡';
    const LD_ORDER_SELECT4 = '美团';
    const LD_ORDER_SELECT5 = '滴滴';
    const LD_ORDER_SELECT6 = '代充';
    /**
     * 状态
     * @var array
     */
    public static $statusLabel = array(
        self::STATUS_DEFAULT => "审核中",
        self::STATUS_SUCCESS => "审核通过",
        self::STATUS_REFUSED => "审核不通过",
    );

    public static $pay_status = array(
        self::PAY_STATUS_AWAIT => "待支付",
        self::PAY_STATUS_PENDING => "支付处理中",
        self::PAY_STATUS_SUCCEEDED => "支付成功",
        self::PAY_STATUS_FAILED => "支付失败",
        self::PAY_STATUS_DDYC => "订单异常",
    );

    public static $ld_order_select = array(
        self::LD_ORDER_SELECT1 => "录单",
        self::LD_ORDER_SELECT2 => "话费",
        self::LD_ORDER_SELECT3 => "油卡",
        self::LD_ORDER_SELECT4 => "美团",
        self::LD_ORDER_SELECT5 => "滴滴",
        self::LD_ORDER_SELECT6 => "代充",
    );
}
