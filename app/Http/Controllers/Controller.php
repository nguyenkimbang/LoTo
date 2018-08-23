<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $token;

    /**
     * [_getToken description] get token from cache
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @return [type] [description]
     */
    public function _setToken()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION["token"])) {
            $this->token = $_SESSION["token"];
        }
    }

    /**
     * [hasLogin description] is check user login?
     *
     * @return boolean [description]
     */
    public function hasLogin()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION["token"])) {
            return true;
        }

        return false;
    }

    /**
     * [conApi description] connect api;
     *
     * @param  [type] $url    [description]
     * @param  [type] $json   [description]
     * @param  string $method [post, put, delete,...]
     * @return [type]   json  [description]
     */
    public function postApi($url, $json, $method = 'POST')
    {
        $client = new \GuzzleHttp\Client(['base_uri' => config('app.api')]);

        if ($method == 'POST' || $method == 'PUT') {
            $res = $client->request($method, $url, [
                'headers' => array('Content-Type' => 'application/json', 'Authorization' => isset($this->token) ? $this->token : ''),
                'json' => $json,
            ]);
        } else {
            $res = $client->request($method, $url, [
                'headers' => array('Content-Type' => 'application/json', 'Authorization' => isset($this->token) ? $this->token : ''),
            ]);
        }
        $check_data = json_decode($res->getBody()->getContents(), true);

        return $check_data;
    }

    /**
     * [conApiHasFile description]
     * @param  [type] $url  [description]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function postApiHasFile($url, $data)
    {
        $client = new \GuzzleHttp\Client(['base_uri' => config('app.api')]);
        $res = $client->request('POST', $url, [
            'headers' => array('Authorization' => $this->token),
            'multipart' => $data,
        ]);
        $check_data = json_decode($res->getBody()->getContents(), true);
        return $check_data;
    }
}
