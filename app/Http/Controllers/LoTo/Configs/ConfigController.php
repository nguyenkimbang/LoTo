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
        $url = $this->API . 'setting?mod=list_config';
        $json = [
        ];

        //call postAPI_v2 function from parent Controller
        $resultRep = self::postAPI_v2($url, $json, "GET");       

        if (isset($resultRep['data'])) {
            $listParentCode = $this->getListParentCode($resultRep['data']);
        }
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

    public function getListParentCode($data)
    {
        $listParentCode = [];
        foreach ($data as $key => $value) {
            $totalPecent = 0;
            foreach ($data as $childKey => $second) {
                if ($value['Code'] != $second['Code']) {
                    if ($second['Parent_Code'] == $value['Code']) {
                        $totalPecent += $second['Value']; 
                    }
                }
            }

            if ($totalPecent < 100) {
                $listParentCode[] = $value['Code'];
            }
        }

        return $listParentCode;
    }
}