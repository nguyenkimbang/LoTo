<?php
namespace App\Http\Controllers\LoTo\Configs;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 *
 */
class ConfigController extends Controller
{

    public function index()
    {
        return view('lotos.configs.index');
    }

    public function create()
    {
        $listParentCode = $this->getListParentCode();

        return view('lotos.configs.partials.add-config', compact('listParentCode'));
    }

    public function edit($code)
    {
        $config = [];

        $listParentCode = $this->getListParentCode($code, $config);

        return view('lotos.configs.partials.add-config', compact('listParentCode', 'config'));
    }

    /**
     * [getData description]
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @return [type] [description]
     */
    public function getData()
    {
        $url = config('app.api') . 'setting?mod=list_config';

        return new JsonResponse($this->getListData($url));
    }

    /**
     * [getListParentCode description]
     * get list config with total percent form childs < 100
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function getListParentCode($code = null, &$config = [])
    {

        $url = config('app.api') . 'setting?mod=list_config';
        $result = $this->getListData($url);

        $listParentCode = [];
        if (isset($result['data'])) {
            foreach ($result['data'] as $key => $parentCode) {

                if ($code != $parentCode['Code']) {
                    $listParentCode[] = $parentCode['Code'];
                }

                if ($code == $parentCode['Code']) {
                    $config = $parentCode;
                }
            }
        }

        return $listParentCode;
    }
}
