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
        $this->_setToken();

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
        $this->_setToken();

        $client = new \GuzzleHttp\Client(['base_uri' => config('app.api')]);
        $res = $client->request('POST', $url, [
            'headers' => array('Authorization' => $this->token),
            'multipart' => $data,
        ]);
        $check_data = json_decode($res->getBody()->getContents(), true);
        return $check_data;
    }

    /**
     * [_startSession description]
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @return [type] [description]
     */
    public function _startSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * [getDataJson description]

     * @return [type] [description]
     */
    public function getDataJson($url)
    {

        $datatable = array_merge(['pagination' => [], 'sort' => [], 'query' => []], $_REQUEST);

        $page = !empty($datatable['pagination']['page']) ? (int) $datatable['pagination']['page'] : 1;
        $perpage = !empty($datatable['pagination']['perpage']) ? (int) $datatable['pagination']['perpage'] : 50;
        $sort = !empty($datatable['sort']['sort']) ? $datatable['sort']['sort'] : 'desc';
        $field = !empty($datatable['sort']['field']) ? $datatable['sort']['field'] : 'CODE';

        $arrnew = $this->getListData($url);
        $total = 10;
        $data = isset($arrnew['data']) ? $arrnew['data'] : [];
        $filter = isset($datatable['query']['generalSearch']) && is_string($datatable['query']['generalSearch'])
        ? $datatable['query']['generalSearch'] : '';
        if (!empty($filter)) {
            $data = array_filter($data, function ($a) use ($filter) {
                return (boolean) preg_grep("/$filter/i", (array) $a);
            });
            unset($datatable['query']['generalSearch']);
        }

        $meta = [];
        $pages = 1;
        //sort
        usort($data, function ($a, $b) use ($sort, $field) {
            if (!isset($a[$field]) || !isset($b[$field])) {
                return false;
            }
            if ($sort === 'asc') {
                return $a[$field] > $b[$field] ? true : false;
            }
            return $a[$field] < $b[$field] ? true : false;
        });
        // $perpage 0; get all data
        if ($perpage > 0) {
            $pages = ceil(count($data) / $perpage); // calculate total pages
            $pages1 = ceil($total / $perpage); // calculate total pages
            $page = max($page, 1); // get 1 page when $_REQUEST['page'] <= 0
            $page = min($page, $pages1); // get last page when $_REQUEST['page'] > $totalPages
            $offset = ($page - 1) * $perpage;
            if ($offset < 0) {
                $offset = 0;
            }
            // $data = array_slice($data, $offset, $perpage, true);
        }
        $meta = [
            'page' => $page,
            'pages' => $pages,
            'perpage' => $perpage,
            'total' => $total,
        ];
        // if selected all records enabled, provide all the ids
        if (isset($datatable['requestIds']) && filter_var($datatable['requestIds'], FILTER_VALIDATE_BOOLEAN)) {
            $meta['rowIds'] = array_map(function ($row) {
                return $row->RecordID;
            }, $alldata);
        }

        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
        $result = [
            'meta' => $meta + [
                'sort' => $sort,
                'field' => $field,
            ],
            'data' => $data,
        ];
        return json_encode($result, JSON_PRETTY_PRINT);
    }

    /**
     * [getListCategory description]
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @return [type] list category[description]
     */
    public function getListData($urlConApi)
    {
        return $this->postApi($urlConApi, [], "GET");

        return [];
    }
}
