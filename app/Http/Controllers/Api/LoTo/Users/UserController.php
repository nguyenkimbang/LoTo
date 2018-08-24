<?php
namespace App\Http\Controllers\Api\LoTo\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

// use Symfony\Component\HttpFoundation\Session\Session;

/**
 *
 */
class UserController extends Controller
{

    /**
     * 
     */
    public function store(Request $request)
    {
        $dataReq = $this->configDataReq($request->all());

        if (!empty($dataReq) && isset($request->Password)) {
            $dataReq[] = [
                "name" => "Password",
                "contents" => $request->Password,
            ];
        }

        $dataReq = $this->getContentFile($request, $dataReq);


        $url = config('app.api') . 'users';

        return new JsonResponse([]);
        return new JsonResponse($this->postApiHasFile($url, $dataReq, 'POST'));
    }

    public function edit(Request $request)
    {
        $dataReq = $this->configDataReq($request->all());

        $dataReq = $this->getContentFile($request, $dataReq);

        $url = config('app.api') . 'users';
        return new JsonResponse([]);
        return new JsonResponse($this->postApiHasFile($url, $dataReq, 'POST'));
    }

    public function remove(Request $request)
    {
        $url = config('app.api') . 'users?mod=delete_user&id=' . $request->id;

        return new JsonResponse([]);
        return new JsonResponse($this->postApi($url, [], 'DELETE'));
    }

    public function getContentFile(Request $request, $dataReq)
    {
        if ($request->hasFile('Avatar')) {
            $file = $request->Avatar;

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

        return $dataReq;
    }

    public function configDataReq($dataReq = [], $mod = 'insert_user')
    {
        if (!empty($dataReq)) {
            $data = [
                [
                    "name" => $mod,
                    "contents" => $mod,
                ],
                [
                    "name" => "Username",
                    "contents" => (isset($dataReq['Username'])) ? $dataReq['Username'] : '',
                ],
                [
                    "name" => "Full_Name",
                    "contents" => (isset($dataReq['Full_Name'])) ? $dataReq['Full_Name'] : '',
                ],
                [
                    "name" => "Role_Code",
                    "contents" => (isset($dataReq['Role_Code'])) ? $dataReq['Role_Code'] : '',
                ],
                [
                    "name" => "Avatar",
                    "contents" => (isset($dataReq['Avatar'])) ? $dataReq['Avatar'] : '',
                ]
            ];
            return $data;
        }
        return [];
    }

    /**

     * [getData description]
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @return [type] [description]
     */
    public function getData()
    {

        $url = config('app.api') . 'users?mod=get_info_user&id=1';

        return $this->getDataJson($url);
    }

    /**
     * [login description]
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function login(Request $request)
    {
        $dataReq = $this->configData($request->all());

        $url = config('app.api') . 'users';

        return new JsonResponse($this->handleLogin($dataReq, $url));
    }

    /**
     * [configData description]
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @param  [type] $dataCongf [description]
     * @param  string $type      [description]
     * @return [type]            [description]
     */
    public function configData($dataCongf, $type = 'login')
    {

        if ($type == 'login') {
            return [
                'mod' => 'login',
                "username" => $dataCongf['username'],
                "password" => md5($dataCongf['password']),
            ];
        }

        return [];
    }

    /**
     * [handleLogin description]
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @param  [type] $dataReq [description]
     * @param  [type] $url     [connect to api]
     * @return [type]          [description]
     */
    public function handleLogin($dataReq, $url)
    {
        //call postAPI_v2 function from parent Controller
        $resultRep = $this->postApi($url, $dataReq);

        //check sessioc started?
        $this->_startSession();

        if (isset($resultRep['status']) && $resultRep['status'] && !isset($_SESSION["token"])) {
            $token = 'LOGO ' . $resultRep['data'][0]['token'];

            $_SESSION["token"] = $token;
        }

        return $resultRep;
    }
}
