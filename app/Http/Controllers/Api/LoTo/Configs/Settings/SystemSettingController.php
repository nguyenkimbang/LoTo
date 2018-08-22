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
        $this->_getApi();
        $this->_getToken();
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

        if (isset($request->isCreate) && isset($request->Code)) {
            if ($this->checkExistCode($request->Code)) {
                return new JsonResponse(['status' => false, "msg" => "error", "data" => [], 'code' => 400]);
            }
        }

        $dataReq = $this->configDataRequest($request->all());

        return new JsonResponse($this->conApi($dataReq));
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

        return new JsonResponse($this->conApi($dataReq));
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
        $url = $this->API . 'setting?mod=delete_config&code=' . $request->Code;

        //call postAPI_v2 function from parent Controller
        $resultRep = $this->postAPI_v2($url, [], 'DELETE');

        return new JsonResponse($dataReq);
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
        if (isset($this->listSetting) && is_array($this->listSetting)) {
            $listSetting = $this->listSetting;
            foreach ($listSetting as $key => $value) {
                if (isset($value['Code']) && $code == $value['Code']) {
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

    /**
     * [conApi description]
     * connet api server
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @return [type] [description]
     */
    public function conApi($dataReq)
    {
        $url = $this->API . 'setting';

        //call postAPI_v2 function from parent Controller
        return $this->postAPI_v2($url, $dataReq);
    }
}
