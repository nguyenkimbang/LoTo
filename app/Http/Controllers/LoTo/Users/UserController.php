<?php
namespace App\Http\Controllers\LoTo\Users;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\JsonResponse;

//GuzzleException

/**
 *
 */
class UserController extends Controller
{
    /**
     * [index description]
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @return [type] view [redirect to index page]
     */
    public function index()
    {

        return view('lotos.users.index');
    }

    /**
     * [create description]
     * @author [Nguyen Kim Bang] <[<nguenkimbang208@gmail.com>]>
     * @return [type] view [redirect to create or edit page]
     */
    public function create()
    {
        return view('lotos.users.partials.add-or-edit');
    }

    public function getData()
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
        $url = config('app.api') . 'users?mod=get_info_user&id=1';
        $json = [
        ];
        //call postAPI_v2 function from parent Controller
        $resultRep = $this->postApi($url, $json, "GET");

        // return json_encode($resultRep);

        // dd($resultRep->toJson);

        return new JsonResponse($resultRep);
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
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION["token"])) {
            unset($_SESSION["token"]);
        }

        return redirect('/login');
    }
}
