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

    public function edit($code)
    {
        $game = $this->getGame($code);
        return view('lotos.games.partials.create', compact('game'));
    }

    /**
     * [getGame description]
     * get list config with total percent form childs < 100
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function getGame($code = null)
    {

        $url = $url = config('app.api') . 'game?mod=list_game_admin';
        $result = $this->getListData($url);

        if (isset($result['data'])) {
            foreach ($result['data'] as $key => $game) {

                if ($code == $game['Code']) {
                    return $game;
                }
            }
        }

        return [];
    }
}
