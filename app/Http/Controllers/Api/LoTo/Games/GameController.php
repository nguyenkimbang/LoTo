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
    public function store(Request $request)
    {

        $dataReq = $this->configDataReq($request->all());

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

        $url = config('app.api') . 'game';

        return new JsonResponse($this->postApiHasFile($url, $dataReq));
    }

    /**

     * [getData description]
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @return [type] [description]
     */
    public function getData()
    {

        $url = config('app.api') . 'game?mod=list_game_admin';

        return $this->getDataJson($url);
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
