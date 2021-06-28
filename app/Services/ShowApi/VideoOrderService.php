<?php

namespace App\Services\ShowApi;

use App\Exceptions\LogicException;
use App\Models\Order;
use App\Models\OrderVideo;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Wanwei\Api\VideoCard;

/**
 * Description:万维视频接口
 *
 * Class VideoOrderService
 *
 * @package App\Services\ShowApi
 * @author  lidong<947714443@qq.com>
 * @date    2021/6/22 0022
 */
class VideoOrderService extends CommonService
{
    
    /**
     * Description:视频会员商品列表
     *
     * @return mixed
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/6/22 0022
     */
    public function getList()
    {
        try {
            $VideoCard = new VideoCard();
            $res = $VideoCard->getList();
        } catch (Exception $e) {
            throw $e;
        }
        return $res;
    }
    
    /**
     * Description:视频会员卡密获取
     *
     * @param $genusId
     * @param $order_no
     *
     * @return mixed
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/6/22 0022
     */
    public function getVideoCard($genusId, $order_no)
    {
        try {
            $VideoCard = new VideoCard();
            $res = $VideoCard->getVideoCard($genusId, $order_no);
        } catch (Exception $e) {
            throw $e;
        }
        return $res;
    }
    
    /**
     * Description:获取万维订单信息
     *
     * @param $order_no
     *
     * @return mixed
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/6/23 0023
     */
    public function getWanWeiOrder($order_no)
    {
        try {
            $VideoCard = new VideoCard();
            $res = $VideoCard->getVideoOrder($order_no);
        } catch (Exception $e) {
            throw $e;
        }
        return $res;
    }
    
    /**
     * Description:创建视频会员订单
     *
     * @param  \App\Models\User  $user     用户信息
     * @param  float             $money    金额
     * @param  string            $genusId  商品ID
     *
     * @return array
     * @throws \Throwable
     * @author lidong<947714443@qq.com>
     * @date   2021/6/22 0022
     */
    public function setOrder(User $user, $money, $genusId)
    {
        $uid = $user->id;
        $order_no = createOrderNo();
        $Order = new Order();
        DB::beginTransaction();
        try {
            $Order->setVideoOrder($uid, $money, $order_no);
            $order_id = $Order->id;
            $VideoOrder = new OrderVideo();
            switch ($genusId) {
                case '3b347362cf63be7632d8f064a652821a': /* 爱奇艺黄金会员 月卡 */
                case '021ea602b1a5be7bda2ce8d5b30e1a25': /* 爱奇艺黄金会员 季卡*/
                case 'a6b189913e61860c05fe286df309f390': /* 爱奇艺黄金会员 年卡*/
                case '53d3ee944e34d86dedba7c17ccf0dd5b': /* 爱奇艺黄金会员 半年卡*/
                    $VideoOrder->setWanweiIQYiOrder($user->id, $order_id, $order_no, $money, $genusId);
                    break;
                case 'abce9ed46812ae4c7472cae99c5f00dd': /* 优酷黄金会员 周卡 */
                case 'cc5da3a37df39b254e399e028bf268b6': /* 优酷黄金会员 月卡*/
                case 'f0478e790d16a6e1433b57eae4191010': /* 优酷黄金会员 季卡*/
                    $VideoOrder->setWanweiYouKuOrder($user->id, $order_id, $order_no, $money, $genusId);
                    break;
                case 'aa72ad792faa41e09f1c93943a3db890': /* 腾讯视频VIP 月卡*/
                case 'ff2a2437e2d91c5cbc15eec7fbfe77b1': /* 腾讯视频VIP 季卡*/
                case 'd63fb08d8cbce1e4ccec0237ae871299': /* 腾讯视频VIP 年卡*/
                    $VideoOrder->setWanweiTencentOrder($user->id, $order_id, $order_no, $money, $genusId);
                    break;
                default:
                    throw new Exception('未知类型会员');
            }
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
        return $Order->toArray();
    }
    
    /**
     * Description: 万维订单充值
     *
     * @param  int                $order_id
     * @param  \App\Models\Order  $Order
     *
     * @return mixed
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/6/22 0022
     */
    public function recharge($order_id, Order $Order)
    {
        if (empty($Order)) {
            $Order = Order::find($order_id);
        }
        try {
            if (empty($Order)) {
                throw new Exception('订单信息不存在');
            }
            if ($Order->video->pay_status != '0') {
                throw new Exception('订单 '.$Order->order_no.' 无法充值');
            }
            try {
                $card_list = $this->getVideoCard($Order->video->item_id, $Order->order_no);
            } catch (Exception $e) {
                $Order->video->status = OrderVideo::STATUS_FAIL;
                $Order->video->updated_at = date('Y-m-d H:i:s');
                $Order->video->save();
                throw $e;
            }
            /* 视频订单状态更新 */
            $Order->video->pay_status = '1';
            $Order->video->card_list = json_encode($card_list);
            $Order->video->status = OrderVideo::STATUS_SUCCESS;
            $Order->video->updated_at = date('Y-m-d H:i:s');
            $Order->video->save();
        } catch (Exception $e) {
            throw $e;
        }
        return $card_list;
    }
}
