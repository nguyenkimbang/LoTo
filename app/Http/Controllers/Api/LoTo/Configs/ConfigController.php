<?php
namespace App\Http\Controllers\Api\LoTo\Configs;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 *
 */
class ConfigController extends Controller
{

    public function __construct()
    {
        $this->_setToken();
    }

    /**
     * [store description]
     * @author [nguyen kim bang] <[<nguyenkimbang208@gmail.com>]>
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request)
    {

        if (isset($request->isCreate) && isset($request->Code)) {
            if ($this->checkCreate($request->Code)) {
                return new JsonResponse(['status' => false, "msg" => "error", "data" => [], 'code' => 400]);
            }
        }

        $dataReq = self::configDataReq($request->all());

        $url = config('app.api') . 'setting';

        //call postAPI_v2 function from parent Controller
        $resultRep = $this->postApi($url, $dataReq);

        return new JsonResponse($resultRep);
    }

    /**
     * [checkCreate description]
     * check exist code
     * @param  [type] $code [description]
     * @return [type]       [description]
     */
    public function checkCreate($code)
    {

        $url = config('app.api') . 'setting?mod=list_config';
        $json = [];

        $resultRep = $this->postApi($url, $json, "GET");

        if (isset($resultRep['data'])) {
            foreach ($resultRep['data'] as $key => $value) {
                if ($code == $value['Code']) {
                    return true;
                }
            }
        }

        return false;
    }

    public function removeConfig(Request $request)
    {
        $url = config('app.api') . 'setting?mod=delete_config&code=' . $request->Code;

        //call postAPI_v2 function from parent Controller
        $resultRep = $this->postApi($url, [], 'DELETE');

        return new JsonResponse($resultRep);
    }

    /**
     * [configDataReq description]
     * @author [nguyen kim bang] <[<nguyenkimbang208@gail.com>]>
     * @param  array  $dataReq [description]
     * @return [type]          [description]
     */
    public function configDataReq($dataReq = [])
    {
        if (!empty($dataReq)) {
            return [
                'mod' => 'update_config',
                'code' => isset($dataReq['Code']) ? $dataReq['Code'] : '',
                'type' => isset($dataReq['Type']) ? $dataReq['Type'] : '',
                'value' => isset($dataReq['Value']) ? $dataReq['Value'] : '',
                'status' => isset($dataReq['Status']) ? 1 : 0,
                'game_code' => isset($dataReq['Game_Code']) ? $dataReq['Game_Code'] : '',
                'parent_code' => isset($dataReq['Parent_Code']) ? $dataReq['Parent_Code'] : '',
                'ETH_address' => isset($dataReq['ETH_Address']) ? $dataReq['ETH_Address'] : '',
                'description' => isset($dataReq['Description']) ? $dataReq['Description'] : '',
            ];
        }

        return [];
    }

    public function checkFileRequest(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->image;

            if ($file->getClientSize() > 0) {

                $time = time();

                return [
                    'name' => 'image',
                    'originalname' => $time . $file->getClientOriginalName(),
                    'filename' => $time . $file->getClientOriginalName(),
                    'mimetype' => $file->getMimeType(),
                    'contents' => !empty($file->getPathName()) ? file_get_contents($file->getPathName()) : '',
                ];
            }
        }

        return [];
    }
}
