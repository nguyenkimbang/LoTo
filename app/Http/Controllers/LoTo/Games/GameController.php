<?php
namespace App\Http\Controllers\Loto\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 *
 */
class GameController extends Controller
{
    public function __construct()
    {
        $this->_setToken();
    }

    public function index()
    {
        return view('lotos.games.index');
    }

    public function getData()
    {
        /**
         * [$method description]
         * @param [url] $[pathUrl] [<description>]
         * $url: example: user or user/get/id=..;
         * @param [array] $[json] [array data]
         * @param [method] $[method] [POST, DELETE, PUT]
         * @var string
         */
        $url = config('app.api') . 'game?mod=list_game_admin';
        $json = [];
        //call postAPI_v2 function from parent Controller
        $resultRep = self::postApi($url, $json, "GET");

        return new JsonResponse($resultRep);
    }

    public function create()
    {
        return view('lotos.games.partials.create');
    }
}
