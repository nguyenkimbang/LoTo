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

        $dataReq = $this->getContentFile($request, $dataReq);

        $url = config('app.api') . 'game';

        return [];

        return new JsonResponse($this->postApiHasFile($url, $dataReq));
    }

    public function edit(Request $request)
    {
        $dataReq = $this->configDataReq($request->all());

        $dataReq = $this->getContentFile($request, $dataReq);

        $url = config('app.api') . 'game';

        return [];

        return new JsonResponse($this->postApiHasFile($url, $dataReq));
    }

    public function remove(Request $request)
    {
        $url = config('app.api') . 'games?mod=delete_game&code=' . $request->Code;

        return [];

        return new JsonResponse($this->postApi($url, [], 'DELETE'));
    }

    public function getContentFile(Request $request, $dataReq)
    {
        if ($request->hasFile('Image')) {
            $file = $request->Image;

            if ($file->getClientSize() > 0) {

                $time = time();

                $arr_image = [
                    'name' => 'Image',
                    'originalname' => $time . $file->getClientOriginalName(),
                    'filename' => $time . $file->getClientOriginalName(),
                    'mimetype' => $file->getMimeType(),
                    'contents' => !empty($file->getPathName()) ? file_get_contents($file->getPathName()) : '',
                ];

                array_push($dataReq, $arr_image);
            }
        }

        return $dataReq;
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

    public function configDataReq($dataReq = [], $mod = 'update_game')
    {
        if (!empty($dataReq)) {
            $data = [
                [
                    "name" => "mod",
                    "contents" => (isset($dataReq['mod'])) ? $dataReq['mod'] : '',
                ],
                [
                    "name" => "Code",
                    "contents" => (isset($dataReq['Code'])) ? $dataReq['Code'] : '',
                ],
                [
                    "name" => "Picked_No",
                    "contents" => (isset($dataReq['Picked_No'])) ? $dataReq['Picked_No'] : '',
                ],
                [
                    "name" => "Collection_No",
                    "contents" => (isset($dataReq['Collection_No'])) ? $dataReq['Collection_No'] : '',
                ],
                [
                    "name" => "Name",
                    "contents" => (isset($dataReq['Name'])) ? $dataReq['Name'] : '',
                ],
                [
                    "name" => "Price",
                    "contents" => (isset($dataReq['Price'])) ? $dataReq['Price'] : '',
                ],
                [
                    "name" => "Color",
                    "contents" => (isset($dataReq['Color'])) ? $dataReq['Color'] : '',
                ],
                [
                    "name" => "Expire_Time",
                    "contents" => (isset($dataReq['Expire_Time'])) ? $dataReq['Expire_Time'] : '',
                ],
                [
                    "name" => "Draw_Time",
                    "contents" => (isset($dataReq['Draw_Time'])) ? $dataReq['Draw_Time'] : '',
                ],
                [
                    "name" => "Status",
                    "contents" => (isset($dataReq['Status'])) ? $dataReq['Status'] : '',
                ],
            ];
            return $data;
        }
        return [];
    }

}
