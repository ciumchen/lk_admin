<?php

namespace App\Admin\Actions\Grid;

use App\Services\WithdrawCashService;
use Dcat\Admin\Grid\RowAction;
use Illuminate\Http\Request;

class ReGetWithdraw extends RowAction
{
    protected $model;
    
    protected $title = '<i class="fa  fa-send-o"> 记录核查</i>';
    
    public function handle(Request $request)
    {
        $id = $this->getKey();
        try {
            $WithdrawService = new WithdrawCashService();
            $WithdrawService->checkWithdrawStatus($id);
        } catch (\Exception $e) {
            throw $e;
        }
        dd($id);
    }
}