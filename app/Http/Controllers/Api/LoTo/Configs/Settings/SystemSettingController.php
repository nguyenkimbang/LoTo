<?php
namespace App\Http\Controllers\Api\LoTo\Configs\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
     * [store description]
     * add new system setting
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request)
    {
        if (isset($request->Code)) {
            if ($this->checkExistCode($request->Code)) {
                return new JsonResponse(['status' => false, "msg" => "error", "data" => [], 'code' => 400]);
            }
        }

        $dataReq = $this->configDataRequest($request->all());

        $url = config('app.api') . 'setting';

        return new JsonResponse($this->postApi($url, $dataReq));
    }

    /**
     * [edit description]
     * user system setting
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function edit(Request $request)
    {
        $dataReq = $this->configDataRequest($request->all());

        $url = config('API') . 'setting';

        return new JsonResponse($this->postApi($url, $dataReq));
    }

    /**
     * [remove description]
     * remove sytem setting
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function remove(Request $request)
    {
        $url = config('app.api') . 'setting?mod=delete_config&code=' . $request->Code;

        return new JsonResponse($this->postApi($url, [], 'DELETE'));
    }

    /**
     * [checkExistCode description]
     * check current code request from client exist database?
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @param  [type] $code [description]
     * @return [type]       [description]
     */
    public function checkExistCode($code)
    {

        $urlConApi = config('app.api') . 'setting?mod=system_settings';
        $json = [];

        //call postAPI_v2 function from parent Controller
        $resultRep = $this->postApi($urlConApi, $json, "GET");

        if (isset($resultRep['data'])) {
            foreach ($resultRep['data'] as $key => $value) {
                if ($code == $value['Code']) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * [configDataRequest description]
     * format data
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function configDataRequest($data)
    {
        return [
            'mod' => 'update_system_setting',
            'Code' => (isset($data['Code'])) ? $data['Code'] : '',
            'Value' => (isset($data['Value'])) ? $data['Value'] : '',
            'Description' => (isset($data['Description'])) ? $data['Description'] : '',
        ];
    }
}
