<?php
namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

// use Symfony\Component\HttpFoundation\Session\Session;

/**
 *
 */
class UserController extends Controller
{
    public function __construct()
    {
        $this->_getApi();
        $this->_getToken();
    }

    public function store(Request $request)
    {
        return new JsonResponse(['status' => true, 'data' => ['name' => 1111]]);
    }

    public function login(Request $request)
    {
        $dataReq = self::configData($request->all());

        $url = $this->API . 'users';

        //call postAPI_v2 function from parent Controller
        $resultRep = self::postAPI_v2($url, $dataReq);

        if (isset($resultRep['status']) && $resultRep['status']) {
            $token = 'LOGO ' . $resultRep['data'][0]['token'];
            \Cache::put('token_login', $token, 3600);
            // $session = new Session();
            // $session->set('token_login', $token);
        }

        return new JsonResponse($resultRep);
    }

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
}
