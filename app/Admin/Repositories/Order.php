<?php

namespace App\Admin\Repositories;

use App\Models\Order as Model;
use Dcat\Admin\Admin;
use Dcat\Admin\Repositories\EloquentRepository;

class Order extends EloquentRepository
{

    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;

    const STATUS_DEFAULT       = 1;

    const STATUS_SUCCESS       = 2;

    const STATUS_REFUSED       = 3;

    const PAY_STATUS_AWAIT     = 'await';

    const PAY_STATUS_PENDING   = 'pending';

    const PAY_STATUS_SUCCEEDED = 'succeeded';

    const PAY_STATUS_FAILED    = 'failed';

    const PAY_STATUS_DDYC      = 'ddyc';

    const LD_ORDER_SELECT1     = '录单';

    const LD_ORDER_SELECT2     = '话费';

    const LD_ORDER_SELECT3     = '油卡';

    const LD_ORDER_SELECT4     = '美团';

    const LD_ORDER_SELECT5     = '滴滴';

    const LD_ORDER_SELECT6     = '代充';

    const LD_ORDER_SELECT7     = '飞机票';

    const LD_ORDER_KTHY     = '开通会员';

    const SHOP_STATUS_DEFAULT       = 1;

    const SHOP_STATUS_ERROE       = 0;

    const PAY_ORDER_FROM_alipay       = 'alipay';
    const PAY_ORDER_FROM_wx       = 'wx';
    const PAY_ORDER_FROM_gwk       = 'gwk';

    /**
     * 状态
     *
     * @var array
     */
    public static $statusLabel = [
        self::STATUS_DEFAULT => "审核中",
        self::STATUS_SUCCESS => "审核通过",
        self::STATUS_REFUSED => "审核不通过",
    ];

    public static $pay_status = [
        self::PAY_STATUS_AWAIT     => "待支付",
        self::PAY_STATUS_PENDING   => "支付处理中",
        self::PAY_STATUS_SUCCEEDED => "支付成功",
        self::PAY_STATUS_FAILED    => "支付失败",
        self::PAY_STATUS_DDYC      => "订单异常",
    ];

    public static $ORDER_FROM = [
        self::PAY_ORDER_FROM_alipay     => "支付宝支付",
        self::PAY_ORDER_FROM_wx   => "微信支付",
        self::PAY_ORDER_FROM_gwk => "购物卡",
    ];

    public static $ld_order_select = [
        self::LD_ORDER_SELECT1 => "录单",
        self::LD_ORDER_SELECT2 => "话费",
        self::LD_ORDER_SELECT3 => "油卡",
        self::LD_ORDER_SELECT4 => "美团",
        self::LD_ORDER_SELECT5 => "滴滴",
        self::LD_ORDER_SELECT6 => "代充",
        self::LD_ORDER_SELECT7 => "飞机票",
        self::LD_ORDER_KTHY => "开通会员",
    ];

    static public $statusLabelStyle = [
        self::STATUS_DEFAULT => 'primary',
        self::STATUS_SUCCESS => 'success',
        self::STATUS_REFUSED => 'danger',
        4                    => 'info',
    ];

    static public $payStatusLabelStyle = [
        self::PAY_STATUS_AWAIT     => 'primary',
        self::PAY_STATUS_PENDING   => 'orange',
        self::PAY_STATUS_SUCCEEDED => 'success',
        self::PAY_STATUS_FAILED    => 'danger',
        self::PAY_STATUS_DDYC      => 'dark',
    ];
    static public $SHOP_STATUS_SH = [
        self::SHOP_STATUS_DEFAULT => 'success',
        self::SHOP_STATUS_ERROE    => 'danger',
    ];
}
