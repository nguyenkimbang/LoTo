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

    public function store(Request $request)
    {
        return new JsonResponse(['status' => true, 'data' => ['name' => 1111]]);
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
