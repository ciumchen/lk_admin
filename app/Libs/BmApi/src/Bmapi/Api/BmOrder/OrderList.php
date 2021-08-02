<?php

namespace Bmapi\Api\BmOrder;

use Bmapi\Core\ApiRequest;
use Exception;

class OrderList extends ApiRequest
{
    /**
     * @var string 接口名称
     */
    protected $method = 'bm.elife.recharge.order.list';
    
    /**
     * @var string 充值账号
     */
    protected $rechargeAccount;
    
    /**
     * @var String 页码，从0开始
     */
    protected $pageNo;
    
    /**
     * @var String 每页显示条数
     */
    protected $pageSize;
    
    /**
     * @var String 订单状态，1 成功 2 充值中 3 已撤销 4 未付款
     */
    protected $orderState;
    
    /**
     * @var String 订单时间，按日查询或者按月查询，yyyy-MM或者yyyy-MM-dd
     */
    protected $orderTime;
    
    /**
     * @var array 接口返回列表数据
     */
    protected $lists = [];
    
    /**
     * @var int 数据总数
     */
    protected $totalCount = 0;
    
    /**
     * @var string[] 接口参数
     */
    private $paramsKey = [
        'rechargeAccount',
        'pageNo',
        'pageSize',
        'orderState',
        'orderTime',
    ];
    
    /** ********************************************* **/
    /**
     * 接口业务参数
     *
     * @return array
     */
    public function apiParams()
    : array
    {
        $params = [];
        foreach ($this->paramsKey as $k) {
            if (isset($this->$k)) {
                $params[ $k ] = $this->$k;
            }
        };
        return array_merge(parent::apiParams(), $params);
    }
    
    /**
     * @return $this|mixed|null
     * @throws \Exception
     */
    public function fetchResult()
    {
        $result = json_decode($this->result, true);
        if (!is_array($result)) {
            return parent::fetchResult();
        }
        if (array_key_exists('errorToken', $result)) {
            throw new Exception($this->result);
        }
        $this->lists = $result[ 'data' ][ 'dataList' ];
        $this->pageNo = $result[ 'data' ][ 'pageNo' ];
        $this->pageSize = $result[ 'data' ][ 'pageSize' ];
        return $this;
    }
    
    public function getLists()
    : array
    {
        return $this->lists;
    }
    
    
    
    /** ********************************************* **/
    /**
     * Description:
     *
     * @param string $val
     *
     * @return $this
     * @author lidong<947714443@qq.com>
     * @date   2021/8/2 0002
     */
    public function setRechargeAccount(string $val)
    : self
    {
        $this->rechargeAccount = $val;
        return $this;
    }
    
    /**
     * Description:
     *
     * @param string $val
     *
     * @return $this
     * @author lidong<947714443@qq.com>
     * @date   2021/8/2 0002
     */
    public function setPageNo(string $val)
    : self
    {
        $this->pageNo = $val;
        return $this;
    }
    
    /**
     * Description:
     *
     * @param string $val
     *
     * @return $this
     * @author lidong<947714443@qq.com>
     * @date   2021/8/2 0002
     */
    public function setPageSize(string $val)
    : self
    {
        $this->pageSize = $val;
        return $this;
    }
    
    /**
     * Description:
     *
     * @param string $val
     *
     * @return $this
     * @author lidong<947714443@qq.com>
     * @date   2021/8/2 0002
     */
    public function setOrderState(string $val)
    : self
    {
        $this->orderState = $val;
        return $this;
    }
    
    /**
     * Description:
     *
     * @param string $val
     *
     * @return $this
     * @author lidong<947714443@qq.com>
     * @date   2021/8/2 0002
     */
    public function setOrderTime(string $val)
    : self
    {
        $this->orderTime = $val;
        return $this;
    }
    
    /** ******************************************** **/
    public function getRechargeAccount()
    : string
    {
        return $this->rechargeAccount;
    }
    
    public function getPageNo()
    : string
    {
        return $this->pageNo;
    }
    
    public function getPageSize()
    : string
    {
        return $this->pageSize;
    }
    
    public function getOrderState()
    : string
    {
        return $this->orderState;
    }
    
    public function getOrderTime()
    : string
    {
        return $this->orderTime;
    }
}
