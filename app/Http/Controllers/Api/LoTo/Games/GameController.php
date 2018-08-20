<?php
namespace App\Http\Controllers\Api\Loto\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 *
 */
class GameController extends Controller
{

    public function __construct()
    {
        $this->_getApi();
        $this->_getToken();
    }

    public function store(Request $request)
    {

        $dataReq = self::configDataReq($request->all());

        if ($request->hasFile('image')) {
            $file = $request->image;

            if ($file->getClientSize() > 0) {

                $time = time();

                $arr_image = [
                    'name' => 'image',
                    'originalname' => $time . $file->getClientOriginalName(),
                    'filename' => $time . $file->getClientOriginalName(),
                    'mimetype' => $file->getMimeType(),
                    'contents' => !empty($file->getPathName()) ? file_get_contents($file->getPathName()) : '',
                ];

                array_push($dataReq, $arr_image);
            }
        }

        $url = $this->API . 'game';

        //call postAPI_v2 function from parent Controller
        $resultRep = $this->uploadAPI_v2($url, $dataReq);

        return new JsonResponse(['data' => $resultRep]);
    }

    public function configDataReq($dataReq = [])
    {
        if (!empty($dataReq)) {
            $data = [
                [
                    "name" => "mod",
                    "contents" => (isset($dataReq['mod'])) ? $dataReq['mod'] : '',
                ],
                [
                    "name" => "code",
                    "contents" => (isset($dataReq['code'])) ? $dataReq['code'] : '',
                ],
                [
                    "name" => "picked_no",
                    "contents" => (isset($dataReq['picked_no'])) ? $dataReq['picked_no'] : '',
                ],
                [
                    "name" => "collection_no",
                    "contents" => (isset($dataReq['collection_no'])) ? $dataReq['collection_no'] : '',
                ],
                [
                    "name" => "name",
                    "contents" => (isset($dataReq['name'])) ? $dataReq['name'] : '',
                ],
                [
                    "name" => "price",
                    "contents" => (isset($dataReq['price'])) ? $dataReq['price'] : '',
                ],
                [
                    "name" => "color",
                    "contents" => (isset($dataReq['color'])) ? $dataReq['color'] : '',
                ],
                [
                    "name" => "expire_time",
                    "contents" => (isset($dataReq['expire_time'])) ? $dataReq['expire_time'] : '',
                ],
                [
                    "name" => "draw_time",
                    "contents" => (isset($dataReq['draw_time'])) ? $dataReq['draw_time'] : '',
                ],
                [
                    "name" => "status",
                    "contents" => (isset($dataReq['status'])) ? $dataReq['status'] : '',
                ],
            ];
            return $data;
        }
        return [];
    }

}
