<?php
namespace App\Http\Controllers\LoTo\Configs;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 * 
 */
class ConfigController extends Controller
{

	public function __construct()
    {
        $this->_getApi();
        $this->_getToken();
    }

	
	public function index()
    {
        return view('lotos.configs.index');
    }

    public function create()
	{
        $listParentCode = $this->getListParentCode($resultRep['data']);

		return view('lotos.configs.partials.add-config', compact('listParentCode'));
	}

	public function getData()
    {
        $listConfig = [];
        /**
         * [$method description]
         * @param [url] $[pathUrl] [<description>]
         * $url: example: user or user/get/id=..;
         * @param [array] $[json] [array data]
         * @param [method] $[method] [POST, DELETE, PUT]
         * @var string
         */
        $url = $this->API . 'setting?mod=list_config';
        $json = [
        ];

        //call postAPI_v2 function from parent Controller
        $resultRep = self::postAPI_v2($url, $json, "GET");       

        return new JsonResponse($resultRep);
    }

    /**
     * [getListParentCode description]
     * get list config with total percent form childs < 100
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function getListParentCode($data)
    {

        $url = $this->API . 'setting?mod=list_config';
        $json = [
        ];

        //call postAPI_v2 function from parent Controller
        $resultRep = self::postAPI_v2($url, $json, "GET");  

        $listParentCode = [];
        if ($resultRep['data']) {
            foreach ($resultRep['data'] as $key => $code) {
                $totalPecent = 0;
                foreach ($resultRep['data'] as $childKey => $parentCode) {
                    if ($code['Code'] != $parentCode['Code']) {
                        if ($parentCode['Parent_Code'] == $code['Code']) {
                            $totalPecent += $parentCode['Value']; 
                        }
                    }
                }

                if ($totalPecent < 100) {
                    $listParentCode[] = $code['Code'];
                }
            }
        }

        return $listParentCode;
    }
}