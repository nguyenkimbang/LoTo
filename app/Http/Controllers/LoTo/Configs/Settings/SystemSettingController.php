<?php
namespace App\Http\Controllers\LoTo\Configs\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 *
 */
class SystemSettingController extends Controller
{

    /**
     * [systemSetting description]
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @return [type] [description]
     */
    public function index()
    {
        return view('lotos.configs.setting.system.index');
    }

    public function create()
    {
        return view('lotos.configs.setting.system.partials.add-setting');
    }

    /**
     * [getDataSystem description]
     * get list system setting
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @return [type] [description]
     */
    public function getData()
    {
        $urlConApi = config('app.api') . 'setting?mod=system_settings';

        return new JsonResponse($this->getListData($urlConApi));
    }
}
