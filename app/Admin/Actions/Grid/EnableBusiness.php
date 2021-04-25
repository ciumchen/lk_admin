<?php

namespace App\Admin\Actions\Grid;


use App\Models\BusinessData;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Grid\RowAction;
use Dcat\Admin\Traits\HasPermissions;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class EnableBusiness extends RowAction
{
    /**
     * @return string
     */
    protected $title = '<i class="fa fa-check"> 启用商家</i>';

    /**
     * Handle the action request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function handle(Request $request)
    {
        $BusinessData = BusinessData::find($this->getKey());
        $BusinessData->status = 1;
        if($BusinessData->save())
        {
            return $this->response()->success('成功！')->refresh();
        }else{
            return $this->response()->error('出错了！');
        }
    }

    /**
	 * @return string|array|void
	 */
	public function confirm()
	{
		// return ['Confirm?', 'contents'];
	}

    /**
     * @param Model|Authenticatable|HasPermissions|null $user
     *
     * @return bool
     */
    protected function authorize($user): bool
    {
        return true;
    }

    /**
     * @return array
     */
    protected function parameters()
    {
        return [];
    }
}
