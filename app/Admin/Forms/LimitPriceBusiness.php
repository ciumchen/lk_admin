<?php

namespace App\Admin\Forms;


use App\Models\BusinessData;
use Dcat\Admin\Contracts\LazyRenderable;
use Dcat\Admin\Widgets\Form;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Dcat\Admin\Traits\LazyWidget;
use exception;
class LimitPriceBusiness extends Form implements LazyRenderable
{
    use LazyWidget; // 使用异步加载功能
    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return Response
     */
    public function handle(array $input)
    {
        $id = $this->payload['id'] ?? null;

        if(!$id){
            return $this->error('商家ID错误');
        }

        $BusinessData = BusinessData::find($id);

        $limitPrice = $input['limit_price'];

        try {
            DB::transaction(function () use ($BusinessData,$limitPrice) {

                $BusinessData->limit_price = $limitPrice;
                $BusinessData->state = 1;
                $BusinessData->save();
            });
        } catch (\Exception $e) {

            return $this->error($e->getMessage());
        }

        return $this->success('成功', '');
    }

    /**
     * Build a form here.
     */
    public function form()
    {

        $this->display('id', '商家ID')->default($this->payload['id']);
        $this->display('uid', '商家UID')->default($this->payload['uid']);
        $this->text('limit_price', '单日录单限额')->required();
    }

    /**
     * The data of the form.
     *
     * @return array
     */
    public function default()
    {
    }
}
