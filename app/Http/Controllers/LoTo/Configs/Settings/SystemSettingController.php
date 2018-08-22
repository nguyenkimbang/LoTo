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
        $this->_getApi();
        $this->_getToken();
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
        $listConfig = [];
        /**
         * [$method description]
         * @param [url] $[pathUrl] [<description>]
         * $url: example: user or user/get/id=..;
         * @param [array] $[json] [array data]
         * @param [method] $[method] [POST, DELETE, PUT]
         * @var string
         */
        $url = $this->API . 'setting?mod=system_settings';
        $json = [
        ];

        //call postAPI_v2 function from parent Controller
        $resultRep = self::postAPI_v2($url, $json, "GET");

        if (isset($resultRep['data'])) {
            $this->listSetting = $resultRep['data'];
        }

        return new JsonResponse($resultRep);
    }
}
