<?php
namespace App\Http\Controllers\LoTo\Configs\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 *
 */
class SystemSettingController extends Controller
{

    public function __construct()
    {
        $this->_setToken();
    }

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
        $json = [];

        //call postAPI_v2 function from parent Controller
        $resultRep = $this->postApi($urlConApi, $json, "GET");

        return new JsonResponse($resultRep);
    }
}
