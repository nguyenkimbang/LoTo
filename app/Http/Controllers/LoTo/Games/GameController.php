<?php
namespace App\Http\Controllers\Loto\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 *
 */
class GameController extends Controller
{

    public function index()
    {
        return view('lotos.games.index');
    }

    public function getData()
    {

        $url = config('app.api') . 'game?mod=list_game_admin';

        return new JsonResponse($this->getListData($url));
    }

    public function create()
    {
        return view('lotos.games.partials.create');
    }
}
