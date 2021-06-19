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

class MessageController extends AdminController
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
            $form->action('save');
            $form->title('新增消息');
            //设置字段宽度
            $form->width(6, 2);
            $form->select('type','接收者')
                ->options([1 => '单个用户', 2 => '所有用户', 3 => '所有商家', 4 => '所有盟主', 5 => '所有站长'])
                ->required()
                ->when(1, function (Form $form) {
                    $form->text('user_id', '用户ID');
                })
                ->default(1);
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
            if ($form->type == 1)
            {
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
            } elseif ($form->type == 2)
            {
                $usersList = (new User())::where('status', 1)->get(['id'])->toArray();
                $this->save($usersList, $mid);
            } elseif ($form->type == 3)
            {
                $businessList = (new User())::where(['role' => 2, 'status' => 1])->get(['id'])->toArray();
                $this->save($businessList, $mid);
            } elseif ($form->type == 4)
            {
                $usersList = (new User())::where(['status' => 1, 'member_head' => 2])->get(['id'])->toArray();
                $this->save($usersList, $mid);
            } elseif ($form->type == 5)
            {
                $cityList =  (new User())
                    ->join('city_node', function($join){
                        $join->on('users.id', 'city_node.uid');
                    })
                    ->where(['users.status' => 1])
                    ->distinct('users.id')
                    ->get(['users.id'])
                    ->toArray();
                $this->save($cityList, $mid);
            }
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
                'type' => 8,
                'sys_mid' => $mid,
                'status' => 1,
                'created_at' => $date,
                'updated_at' => $date,
            ];
        }

        $chunkRes = array_chunk($umsgData, 1000);

        foreach ($chunkRes as $newList)
        {
            (new UserMessage())::insert($newList);
        }
    }
}
