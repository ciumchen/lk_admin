<?php

namespace App\Admin\Controllers;

use App\Models\BusinessData;
use App\Models\SysMessage;
use App\Models\UserMessage;
use App\Models\User;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\Form;
use App\Http\Controllers\Controller;
use Dcat\Admin\Layout\Content;

class SelfMessageController extends AdminController
{

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
        return Form::make(new SysMessage(), function (Form $form) {
            $form->action('self-save');
            $form->title('新增消息');
            //设置字段宽度
            $form->width(6, 2);
            $form->text('user_id', '用户ID')->required();
            $form->text('title', '消息标题')->required()->maxLength(20);
            $form->textarea('content', '消息内容')->required();
            $form->hidden('status')->value(1);
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
     * 保存
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store()
    {
        return $this->form()->saved(function (Form $form) {
            $mid = $form->getKey();

            //插入 user_message 数据
            $usersList = [];
            if(strstr($form->user_id, ','))
            {
                $uids = explode(',', $form->user_id);
            } else
            {
                $uids = explode('，', $form->user_id);
            }

            foreach ($uids as $key => $uid)
            {
                $usersList[$key]['id'] = $uid;
            }
            $this->save($usersList, $mid);
        })->store();
    }

    /**插入消息
     * @param array $data
     * @param int $mid
     * @throws
     */
    private function save(array $data, int $mid)
    {
        //组装数据
        $date = date("Y-m-d H:i:s");
        $umsgData = [];
        foreach ($data as $val)
        {
            $umsgData[] = [
                'user_id' => $val['id'],
                'type' => 3,
                'sys_mid' => $mid,
                'status' => 1,
                'created_at' => $date,
                'updated_at' => $date,
            ];
        }

        (new UserMessage())::insert($umsgData);
    }
}
