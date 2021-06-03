<?php

namespace App\Admin\Controllers;

use App\Models\OrderAirRefund;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\Form;
use Dcat\Admin\Layout\Content;
use GuzzleHttp;

class AirRefundController extends AdminController
{
    const URL = 'http://lkapi.com/api/air-refund';

    public function index(Content $content)
    {
        return $content->body($this->form());
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new OrderAirRefund(), function (Form $form) {
            $form->action('air-send');
            $form->title('机票退订');
            //设置字段宽度
            $form->width(6, 2);
            $form->text('trade_no', '订单主编号')->required();
            $form->text('return_type', '退票类型')->default(3)->required();
            $form->textarea('order_nos', '订单子单编号集合')->required();
            $form->display('订单子单编号集合样式')->value("P141222161001880,P141222161001881");
            $form->footer(function ($footer) {
                //去掉`查看`checkbox
                $footer->disableViewCheck();
                //去掉`继续编辑`checkbox
                $footer->disableEditingCheck();
                //去掉`继续创建`checkbox
                $footer->disableCreatingCheck();
            });
        });
    }

    /**
     * 发送
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store()
    {
        return $this->form()->saved(function (Form $form) {
            if(strstr($form->order_nos, '，'))
            {
                $form->order_nos = str_ireplace('，', ',', $form->order_nos);
            }
            
            $http = new GuzzleHttp\Client;
            //调用话费url
            $response = $http->get(self::URL, [
                'query' => [
                    'tradeNo'    => $form->trade_no,
                    'returnType' => $form->return_type,
                    'orderNos'   => $form->order_nos
                ],
            ]);

            //返回数据
            $res = json_decode($response->getBody(), 1);
            if ($res['code'] == 1)
            {
                return $form->error('机票退订成功');
            } else
            {
                return $form->error('机票退订失败');
            }
        })->store();
    }
}
