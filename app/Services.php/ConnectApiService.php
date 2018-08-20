<?php
namespace App\Servives;

use GuzzleHttp\Client;

/**
 * 
 */
class ConnectApiService
{
	
	/**
	 * [postAPI_v2 description] connect api;
	 * 
	 * @param  [type] $url    [description]
	 * @param  [type] $json   [description]
	 * @param  string $method [post, put, delete,...]
	 * @return [type]   json  [description]
	 */
	public function postAPI_v2($url,$json,$method='POST'){
        $client = new \GuzzleHttp\Client(['base_uri' => $this->API]);

        if($method=='POST'||$method=='PUT'){
            $res = $client->request($method, $url, [
                'headers'=>array('Content-Type'=>'application/json','Authorization'=>isset($this->token)?$this->token:''),
                'json'=>$json
            ]);
        }else{
            $res = $client->request($method, $url, [
                'headers'=>array('Content-Type'=>'application/json','Authorization'=>isset($this->token)?$this->token:'')
            ]);
        }
        $check_data=json_decode($res->getBody()->getContents(),true);

        return $check_data;
    }
}