<?php

namespace App\Services\Alipay;

use AlipayAop\request\AlipayFundTransOrderQueryRequest;
use AlipayAop\request\AlipayFundTransUniTransferRequest;
use AlipayAop\request\AlipaySystemOauthTokenRequest;
use AlipayAop\request\AlipayTradeQueryRequest;
use AlipayAop\request\AlipayUserInfoAuthRequest;
use AlipayAop\request\AlipayUserInfoShareRequest;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserAlipayAuthLastChange;
use App\Models\UserAlipayAuthToken;
use Exception;
use Illuminate\Support\Facades\Log;

/**
 * Description:支付宝证书模式连接操作类
 *
 * Class AlipayCertService
 *
 * @package App\Services\Alipay
 * @author  lidong<947714443@qq.com>
 * @date    2021/8/10 0010
 */
class AlipayCertService extends AlipayBaseService
{
    /**
     * Description:保存用户授权信息
     *
     * @param  array  $data  [
     *                    'uid'       => $uid,
     *                    'auth_code' => $auth_code,
     *                    'app_id'    => $app_id,
     *                    'source'    => $source,
     *                    'scope'     => $scope,
     *                    ]
     *
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/8/7 0007
     */
    public function saveUserAuthCode(array $data)
    {
        try {
            if (empty($data)) {
                throw new Exception('授权信息获取失败');
            }
            $uid = '';
            $auth_code = '';
            $app_id = '';
            $source = '';
            $scope = '';
            extract($data, EXTR_OVERWRITE);
            $UserAlipayAuthToken = new  UserAlipayAuthToken();
            $UserAlipayAuthToken->saveAuthCode($uid, $auth_code, $app_id, $source, $scope);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }
    
    /**
     * Description:绑定用户信息
     *
     * @param $uid
     *
     * @return bool
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/8/7 0007
     */
    public function userBinding($uid)
    {
        try {
            $auth_code = UserAlipayAuthToken::getUserAuthCode($uid);
            if (!$auth_code) {
                throw new Exception('授权码获取失败');
            }
            //code 换取 token
            $access_token_info = $this->getUserAccessTokenByAuthCode($auth_code);
//            $access_token_info = json_decode('{"access_token":"authusrBc1b540f4b59e4c04b96a307560a6cB80","alipay_user_id":"20881038820813146192777761611480","expires_in":1296000,"re_expires_in":2592000,"refresh_token":"authusrBd801a002aaa54749b94cf8e0ff2a3X80","user_id":"2088532266296801"}');
            Log::debug('getUserAccessTokenByAuthCode-', [json_encode($access_token_info)]);
            $token_arr = json_decode(json_encode($access_token_info), true);
            $auth_info = UserAlipayAuthToken::whereAlipayUserId($access_token_info->user_id)->first();
            if (!empty($auth_info) && $auth_info->uid != $uid) {
                throw new Exception('该支付宝已绑定了其他来客账号');
            }
            $this->updateAccessToken($uid, $token_arr);
            // token 获取用户信息
            $user_info = $this->getUserInfoByAccessToken($access_token_info->access_token);
            Log::debug('Alipay-$user_info'.json_encode($user_info));
            $Users = User::findOrFail($uid);
            $Users->alipay_user_id = $user_info->user_id;
            $Users->alipay_nickname = $user_info->nick_name ?? '';
            $Users->alipay_avatar = $user_info->avatar ?? '';
            $Users->save();
            //授权记录
            $AuthLog = new UserAlipayAuthLastChange();
            $AuthLog->saveLog(
                $uid,
                $user_info->user_id,
                $user_info->nick_name ?? '',
                $user_info->avatar ?? '',
                $user_info->alipay_user_id ?? ''
            );
        } catch (Exception $e) {
            Log::debug('Error:Alipay-AuthCode:'.$e->getMessage());
            throw $e;
        }
        return true;
    }
    
    /**
     * Description:用户支付宝绑定状态查询
     *
     * @param  int  $uid  用户ID
     *
     * @return bool
     * @author lidong<947714443@qq.com>
     * @date   2021/8/9 0009
     */
    public function userBindingCheck($uid)
    {
        try {
            $user = User::findOrFail($uid);
            if (!$user->alipay_user_id) {
                throw new Exception('alipay_user_id miss');
            }
        } catch (Exception $e) {
            return false;
        }
        return true;
    }
    
    /**
     * Description:通过auth_code换取access_token
     *
     * @param $auth_code
     *
     * @return string
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/8/9 0009
     */
    public function getUserAccessTokenByAuthCode($auth_code)
    {
        try {
            $AopCertClient = $this->getAopCertClient();
            $Request = new AlipaySystemOauthTokenRequest();
            $Request->setCode($auth_code);
            $Request->setGrantType('authorization_code');
            $Result = $AopCertClient->execute($Request);
            $responseNode = str_replace(".", "_", $Request->getApiMethodName())."_response";
            if (!isset($Result->$responseNode)) {
                throw new Exception('授权令牌获取失败'.json_encode($Result));
            }
        } catch (Exception $e) {
            Log::debug('Error:Alipay-AccessToken:'.$e->getMessage());
            throw $e;
        }
        /**
         * {
         * "alipay_system_oauth_token_response": {
         * "access_token": "authusrB60dec6d4f49f42269a82df627e4f3X28"
         * "alipay_user_id": "20880069462546073717281152811428"
         * "expires_in": 1296000
         * "re_expires_in": 2592000
         * "refresh_token": "authusrB9f61405980104b5fa7cb38eb9d950X28"
         * "user_id": "2088412397910280"
         * }
         * "alipay_cert_sn": "dc1bda7ed3c81023cf6e6e4e59a9b99e"
         * "sign": "H7Iw3gsgC/s5WAGoQmfnR2h6CotzbN67beEKLDbI6Ic3i0BoRbTRW9XkZfQ12nJZWH1SeHxaaJIf4ZWjCr8Ii8TjcYZtgbr0ZfY/yJd5g/saGT3UBCKF6/fDKy9Hg42eHfihR80G1DBTbR2zaXU3if7QBE09sCMXNoNzjsXJI04Fsr16YuFG3kMV9OZ4sFVu2mSOp1YDjalAdq01hyAzPy000V7KIPaxn/85VPOYNBsRnNRB7aZKHzVvinbuemDaS8x8wyFRM1WZlyz59Hxow5Q6UXB4E0HgmLCdUbtE6RW6sGA607g8NBfpK8Ni0aqCPbLvp5KgCYmX7rjxUyQ== "
         * }
         */
        return $Result->$responseNode;
    }
    
    /**
     * Description:更新 accessToken 到数据库
     *
     * @param  int  $uid
     * @param  array  $access_token_arr
     * @param  \App\Models\UserAlipayAuthToken|null  $UserToken
     *
     * @return bool
     * @author lidong<947714443@qq.com>
     * @date   2021/8/9 0009
     */
    public function updateAccessToken(int $uid, array $access_token_arr, UserAlipayAuthToken $UserToken = null)
    {
        try {
            if (empty($access_token_arr)) {
                throw new Exception('用户token信息为空');
            }
            if (empty($UserToken)) {
                $UserToken = UserAlipayAuthToken::whereUid($uid)->first();
            }
            if (empty($UserToken)) {
                throw new Exception('用户没有授权数据');
            }
            $UserToken->access_token = $access_token_arr[ 'access_token' ];
            $UserToken->alipay_user_id = $access_token_arr[ 'user_id' ];
            $UserToken->expires_in = $access_token_arr[ 'expires_in' ];
            $UserToken->re_expires_in = $access_token_arr[ 're_expires_in' ];
            $UserToken->refresh_token = $access_token_arr[ 'refresh_token' ];
            $UserToken->alipay_alipay_user_id = $access_token_arr[ 'alipay_user_id' ];
            $UserToken->save();
        } catch (Exception $e) {
            Log::debug('Error:Alipay-updateAccessToken-'.$e->getMessage());
            return false;
        }
        return true;
    }
    
    /**
     * Description:用accessTOKEN换取用户信息
     *
     * @param $access_token
     *
     * @return $1|false|mixed|\SimpleXMLElement
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/8/9 0009
     */
    public function getUserInfoByAccessToken($access_token)
    {
        try {
            $AopCertClient = $this->getAopCertClient();
            $request = new AlipayUserInfoShareRequest();
            $Result = $AopCertClient->execute($request, $access_token);
            $responseNode = str_replace(".", "_", $request->getApiMethodName())."_response";
            if (!isset($Result->$responseNode) || $Result->$responseNode->code != 10000) {
                throw new Exception('用户信息获取失败'.json_encode($Result));
            }
        } catch (Exception $e) {
            Log::debug('Alipay-Error:'.$e->getMessage());
            throw  $e;
        }
        return $Result->$responseNode;
    }
    
    /**
     * Description: 发起转账请求
     *
     * @param $alipay_user_id
     * @param $real_name
     * @param $order_no
     * @param $money
     * @param $remark
     *
     * @return \$1|false|mixed|\SimpleXMLElement
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/8/12 0012
     */
    public function payToUser($alipay_user_id, $real_name, $order_no, $money, $remark)
    {
        try {
            $payee_info = [
                'identity'      => $alipay_user_id,
                'identity_type' => 'ALIPAY_USER_ID',
                'name'          => $real_name,
            ];
            $business_params = [
                'sub_biz_scene ' => 'REDPACKET',
            ];
            $sign_data = [
                'ori_sign'       => '',
                'ori_sign_type'  => '',
                'ori_char_set'   => '',
                'partner_id'     => '',
                'ori_app_id'     => '',
                'ori_out_biz_no' => '',
            ];
            $data = [
                'out_biz_no'        => $order_no,
                'trans_amount'      => $money,
                'product_code'      => 'TRANS_ACCOUNT_NO_PWD',
                'biz_scene'         => 'DIRECT_TRANSFER',
                'order_title'       => '提现到账',
                'original_order_id' => '',
                'payee_info'        => $payee_info,
                'remark'            => $remark,
                'business_params'   => json_encode($business_params),
                'sign_data'         => array_filter($sign_data),
            ];
            $data = array_filter($data);
            $AopCertClient = $this->getAopCertClient();
            $request = new AlipayFundTransUniTransferRequest();
            $request->setBizContent(json_encode($data));
            $Result = $AopCertClient->execute($request);
            $responseNode = str_replace(".", "_", $request->getApiMethodName())."_response";
            if (!isset($Result->$responseNode) || $Result->$responseNode->code != 10000) {
                throw new Exception(json_encode($Result));
            }
        } catch (Exception $e) {
            Log::debug('Alipay-Error:FundTransfer-'.$e->getMessage());
            throw $e;
        }
        return $Result->$responseNode;
    }
    
    /**
     * Description:提现间隔检查
     *
     * @param $uid
     *
     * @return bool
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date   2021/8/16 0016
     */
    public function changeAlipayAuthCheck($uid)
    {
        try {
            $last_change_time = UserAlipayAuthLastChange::getLastLog($uid);
            $spacing = Setting::getSetting('auth_spacing');
            if ($last_change_time != 0) {
                $last_change_time = strtotime($last_change_time);
                $spacing_days = ceil((time() - $last_change_time) / (24 * 3600));
                if ($spacing_days < $spacing) {
                    throw new Exception("距离上次修改时间为{$spacing_days}天,每次修改间隔为{$spacing}天");
                }
            }
        } catch (Exception $e) {
            throw $e;
        }
        return true;
    }
    
    /**
     * Description:
     *
     * @param $order_no
     *
     * @return \$1|false|mixed|\SimpleXMLElement
     * @throws \Exception
     * @author lidong<947714443@qq.com>
     * @date 2021/8/24 0024
     */
    public function checkWithdrawStatus($order_no)
    {
        try {
            $data = [
                'product_code' => 'TRANS_ACCOUNT_NO_PWD',
                'biz_scene'    => 'DIRECT_TRANSFER',
                'out_biz_no'   => $order_no,
            ];
            $AopCertClient = $this->getAopCertClient();
            $Request = new AlipayFundTransOrderQueryRequest();
            $Request->setBizContent(json_encode($data));
            $Result = $AopCertClient->execute($Request);
            $responseNode = str_replace(".", "_", $Request->getApiMethodName())."_response";
            if (!isset($Result->$responseNode) || $Result->$responseNode->code != 10000) {
                throw new Exception(json_encode($Result));
            }
        } catch (Exception $e) {
            throw $e;
        }
        return $Result->$responseNode;
    }
    
    
    /**
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     *
     */
    /************************** example **********************************/
    public function authByCertWebPage()
    {
        try {
            $AopCertClient = $this->getAopCertClient();
            $request = new AlipayUserInfoAuthRequest();
            $data = [
                'scopes' => ['auth_base'],
                'state'  => 'init',
            ];
            $request->setBizContent(json_encode($data));
            $result = $AopCertClient->pageExecute($request);
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }
    
    public function orderByCert()
    {
        try {
            $AopCertClient = $this->getAopCertClient();
            $request = new AlipayTradeQueryRequest();
            $request->setBizContent("{".
                                    "\"out_trade_no\":\"20150320010101001\",".
                                    "\"trade_no\":\"2014112611001004680 073956707\",".
                                    "\"org_pid\":\"2088101117952222\",".
                                    "      \"query_options\":[".
                                    "        \"TRADE_SETTE_INFO\"".
                                    "      ]".
                                    "  }");
            $result = $AopCertClient->execute($request);
        } catch (Exception $e) {
            throw $e;
        }
        return $result;
    }
}
