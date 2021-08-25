<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\LogicException;
use App\Services\ConvertService;

/**
 * App\Models\Assets
 *
 * @property int $id
 * @property int $uid uid
 * @property int $assets_type_id 资产类型ID
 * @property string $assets_name 资产名称
 * @property string $amount 数量
 * @property string $freeze_amount 冻结数量
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Assets $assetsType
 * @method static \Illuminate\Database\Eloquent\Builder|Assets newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Assets newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Assets query()
 * @method static \Illuminate\Database\Eloquent\Builder|Assets whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assets whereAssetsName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assets whereAssetsTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assets whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assets whereFreezeAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assets whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assets whereUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Assets whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $change_times 资产变更次数
 * @method static \Illuminate\Database\Eloquent\Builder|Assets whereChangeTimes($value)
 */
class Assets extends Model
{
    protected $table = 'assets';

    /**资产类型
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function assetsType(){

        return $this->belongsTo(Assets::class, 'assets_type_id');
    }

    /**
     * 变更余额.
     *
     * @param float  $amount
     * @param string $operateType
     * @param string $remark
     * @param array  $options
     *
     * @return void
     */
    public function change($amount, $operateType, $remark = '', array $options = [])
    {
        $assets = AssetsType::find($this->assets_type_id);
        $assetsLog = AssetsLogs::create([
            'assets_type_id' => $this->assets_type_id,
            'assets_name' => $assets->assets_name,
            'uid' => $this->uid,
            'operate_type' => $operateType,
            'amount' => $amount,
            'amount_before_change' => $this->getRawOriginal('amount'),
            'ip' => $options['ip'] ?? '',
            'user_agent' => $options['user_agent'] ?? '',
            'remark' => $remark,
        ]);

        $this->amount = bcadd($this->getRawOriginal('amount'), $assetsLog->amount, 8);
        $this->save();
    }

    //usdt兑换iets
    public function usdt_to_iets_change($uid,$assetType,$amount,$amount_before_change, $operateType, $remark = '', array $options = [])
    {
        if($assetType=='iets'){
            $tpyeID = 2;
        }elseif($assetType=='usdt'){
            $tpyeID = 3;
        }
//        $assets = AssetsType::find($this->assets_type_id);
        $assets = AssetsType::where('id',$tpyeID)->first();
        $userAssetsInfo =
//        dd($assets);
        $assetsLog = AssetsLogs::create([
            'assets_type_id' => $tpyeID,
            'assets_name' => $assets->assets_name,
            'uid' => $uid,
            'operate_type' => $operateType,
            'amount' => $amount,
            'amount_before_change' => $amount_before_change,
            'ip' => $options['ip'] ?? '',
            'user_agent' => $options['user_agent'] ?? '',
            'remark' => $remark,
        ]);

        $this->amount = bcadd($amount,$amount_before_change, 8);
        $this->save();
    }

    /**获取用户 usdt 数据
     * @param int $uid
     * @return mixed
     * @throws
     */
    public function getUsdtAmount(int $uid)
    {
        $this->isUser($uid);
        
        //返回
        return Assets::where(['uid' => $uid, 'assets_type_id' => 3])->get(['amount', 'freeze_amount'])->first()->toArray();
    }

    /**计算兑换金额
     * @param int $price
     * @return mixed
     * @throws
     */
    public function computePrice(int $price)
    {        
        $usdtPrice = $this->getUsdtPrice();
        //比例
        $ratio = 0.05;

        if (!$usdtPrice)
        {
            throw new LogicException('usdt 金额不能为0');
        }

        //返回
        return bcdiv($price / $usdtPrice, 1 - $ratio, 8);
    }

    /**usdt 兑换话费
     * @param array $data
     * @return mixed
     * @throws
     */
    public function phoneBill(array $data)
    {
        if (!in_array($data['price'], [50, 100]))
        {
            throw new LogicException('兑换话费的金额不在可选范围内');
        }

        //获取所需兑换的usdt 金额
        $data['usdtAmount'] = $this->computePrice($data['price']);

        //检查用户金额
        $this->diffPrice($data);

        return (new ConvertService())->phoneBill($data);
    }

    /**usdt 兑换美团
     * @param array $data
     * @return mixed
     * @throws
     */
    public function meituanBill(array $data)
    {
        if (!in_array($data['price'], [100, 300]))
        {
            throw new LogicException('兑换美团的金额不在可选范围内');
        }

        //获取所需兑换的usdt 金额
        $data['usdtAmount'] = $this->computePrice($data['price']);

        //检查用户金额
        $this->diffPrice($data);

        return (new ConvertService())->meituanBill($data);
    }

    /**获取 usdt 价格
     * @param int $uid
     * @return mixed
     * @throws    
    */
    public function getUsdtPrice()
    {
        return (new Setting())->getSetting('usdt_price');
    }

    /**计算兑换所需金额和用户当前金额的差
     * @param array $data
     * @return mixed
     * @throws    
    */
    public function diffPrice(array $data)
    {
        //用户usdt 金额
        $userPrice = $this->getUsdtAmount($data['uid']);

        if ($data['usdtAmount'] > $userPrice['amount'])
        {
            throw new LogicException('此用户所需兑换的余额不足');
        }
    }

    /**用户是否存在
     * @param int $uid
     * @return mixed
     * @throws    
    */
    public function isUser(int $uid)
    {
        $res = User::where(['id' => $uid, 'status' => 1])->exists();
        if (!$res)
        {
            throw new LogicException('此用户信息不存在');
        }
    }
}
