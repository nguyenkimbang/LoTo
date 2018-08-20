<?php
namespace App\Http\Controllers\LoTo\Users;

use App\Http\Controllers\Controller;
use App\User;

//GuzzleException

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

    /**
     * [index description]
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @return [type] view [redirect to index page]
     */
    public function index()
    {
        $listUser = [];
        /**
         * [$method description]
         * @param [url] $[pathUrl] [<description>]
         * $url: example: user or user/get/id=..;
         * @param [array] $[json] [array data]
         * @param [method] $[method] [POST, DELETE, PUT]
         * @var string
         */
        $url = $this->API . 'users?mod=get_info_user&id=1';
        $json = [
        ];
        //call postAPI_v2 function from parent Controller
        $resultRep = self::postAPI_v2($url, $json, "GET");

        if (isset($resultRep['status']) && $resultRep['status']) {
            $listUser = $resultRep['data'];
        }

        return view('users.index', compact('listUser'));
    }

    /**
     * [create description]
     * @author [Nguyen Kim Bang] <[<nguenkimbang208@gmail.com>]>
     * @return [type] view [redirect to create or edit page]
     */
    public function create()
    {
        return view('users.partials.add-or-edit');
    }

    public function login()
    {
        if ($this->hasLogin()) {
            return redirect('/dashboard');
        }
        return view('auth.login');
    }

    public function logout()
    {
        if ($this->hasLogin()) {
            \Cache::forget('token_login');
        }

        return redirect('/login');
    }
}
