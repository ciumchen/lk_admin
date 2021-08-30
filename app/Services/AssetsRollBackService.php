<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
class AssetsRollBackService
{
    public function updateUserAssets()
    {
        try {
            $sql = "
UPDATE assets a,
assets b
SET b.amount =
IF
 ( a.amount - a.not_deducted_assets > 0, a.amount - a.not_deducted_assets, 0 ),
 b.not_deducted_assets =
IF
 ( a.amount - a.not_deducted_assets > 0, 0, a.not_deducted_assets - a.amount )
WHERE
 b.assets_type_id =1
 AND
 a.id=b.id
";
            $res = DB::update($sql);
            dump($res.'扣除用户的资产');
        } catch (Exception $e) {
            dump("=====updateUserAssets====".$e->getMessage());
        }
    }
}
