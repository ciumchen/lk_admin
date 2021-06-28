<?php

namespace Bmapi\Api\VideoCard;

use Bmapi\Api\MobileRecharge\GetItemInfo;
use Bmapi\Core\ApiRequest;
use Exception;

class VideoItemList extends ApiRequest
{
    
    /**
     * @var string 接口名称
     */
    protected $method = 'bm.elife.video.card.items.list';
    
    /**
     * @var int 页码从0开始
     */
    private $pageNo = 0;
    
    /**
     * @var int 单页返回的记录数
     */
    private $pageSize = 10;
    
    /**
     * @var String 标准商品编号
     */
    private $itemId;
    
    /**
     * @var String 标准商品名称,支持不带特殊字符的模糊匹配
     */
    private $itemName;
    
    /**
     * 视频卡项目编号
     * 优酷会员c7165
     * 迅雷会员c7166
     * 土豆会员c7163
     * 爱奇艺会员c7164
     * 乐视会员c7168
     * 好莱坞会员c7189
     * 芒果TV移动PC端会员c7197
     * 芒果TV全屏会员c7196
     * 搜狐会员c7190
     * 腾讯会员c7229
     *
     * @var String 视频卡项目编号
     */
    private $projectId;
    
    /**
     * @var string[] 所有参数
     */
    private $paramsKey = [
        'pageNo',
        'pageSize',
        'itemId',
        'itemName',
        'projectId',
    ];
    
    /**
     * @var array 列表数据
     */
    private $lists;
    
    /**
     * @var int 总条数
     */
    private $totalCount;
    
    public function apiParams()
    : array
    {
        $params = [];
        foreach ($this->paramsKey as $k) {
            if (isset($this->$k)) {
                $params[ $k ] = $this->$k;
            }
        }
        return array_merge(parent::apiParams(), $params);
    }
    
    /**
     * 结果解析
     *
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
        $this->lists = $result[ 'admin_item_response' ][ 'items' ][ 'item' ];
        $this->totalCount = $result[ 'admin_item_response' ][ 'totalCount' ];
        $this->pageNo = $result[ 'admin_item_response' ][ 'pageNo' ];
        $this->pageSize = $result[ 'admin_item_response' ][ 'pageSize' ];
        return $this;
    }
    
    public function getLists()
    {
        return $this->lists;
    }
    
    public function getTotalCount()
    {
        return $this->totalCount;
    }
    
    /********************************************************************/
    public function setPageNo($val)
    {
        $this->pageNo = $val;
        return $this;
    }
    
    public function setPageSize($val)
    {
        $this->pageSize = $val;
        return $this;
    }
    
    public function setItemId($val)
    {
        $this->itemId = $val;
        return $this;
    }
    
    public function setItemName($val)
    {
        $this->itemName = $val;
        return $this;
    }
    
    public function setProjectId($val)
    {
        $this->projectId = $val;
        return $this;
    }
    
    /*******************************************************************/
    public function getPageNo()
    {
        return $this->pageNo;
    }
    
    public function getPageSize()
    {
        return $this->pageSize;
    }
    
    public function getItemId()
    {
        return $this->itemId;
    }
    
    public function getItemName()
    {
        return $this->itemName;
    }
    
    public function getProjectId()
    {
        return $this->projectId;
    }
}
