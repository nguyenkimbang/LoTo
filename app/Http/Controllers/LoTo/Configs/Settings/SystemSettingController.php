<?php
namespace App\Http\Controllers\LoTo\Configs\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 *
 */
class SystemSettingController extends Controller
{

    /**
     * [systemSetting description]
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @return [type] [description]
     */
    public function index()
    {
        return view('lotos.configs.setting.system.index');
    }

    public function create()
    {
        return view('lotos.configs.setting.system.partials.add-setting');
    }

    public function edit($code)
    {
        $config = [];

        $setting = $this->getSetting($code);

        return view('lotos.configs.setting.system.partials.add-setting', compact('setting'));
    }

    /**
     * [getDataSystem description]
     * get list system setting
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @return [type] [description]
     */
    public function getData()
    {
        $urlConApi = config('app.api') . 'setting?mod=system_settings';

        return new JsonResponse($this->getListData($urlConApi));
    }

    /**
     * [getListParentCode description]
     * get list config with total percent form childs < 100
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function getSetting($code = null)
    {

        $urlConApi = config('app.api') . 'setting?mod=system_settings';
        $result = $this->getListData($urlConApi);

        if (isset($result['data'])) {
            foreach ($result['data'] as $key => $parentCode) {

                if ($code == $parentCode['Code']) {
                    return $parentCode;
                }
            }
        }

        return [];
    }
}
