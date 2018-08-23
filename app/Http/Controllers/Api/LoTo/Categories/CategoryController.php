<?php
namespace App\Http\Controllers\Api\LoTo\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 *
 */
class CategoryController extends Controller
{

    /**
     * [store description]
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request)
    {
        // if (isset($request->Code)) {
        //     if ($this->checkExistCode($request->Code)) {
        //         return new JsonResponse(['status' => false, "msg" => "error", "data" => [], 'code' => 400]);
        //     }
        // }

        $dataReq = $this->configDataRequest($request->all());

        $url = config('app.api') . 'category';

        return new JsonResponse($this->postApi($url, $dataReq, 'POST'));
    }

    /**
     * [edit description]
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function edit(Request $request)
    {
        $dataReq = $this->configDataRequest($request->all(), 'update_category');

        $url = config('app.api') . 'category';

        return new JsonResponse($this->postApi($url, $dataReq, 'PUT'));
    }

    /**
     * [remove description]
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function remove(Request $request)
    {
        $url = config('app.api') . 'category?mod=delete_category&code=' . $request->Code;

        return new JsonResponse($this->postApi($url, [], 'DELETE'));
    }

    public function getDataJson()
    {

        $datatable = array_merge(['pagination' => [], 'sort' => [], 'query' => []], $_REQUEST);

        $page = !empty($datatable['pagination']['page']) ? (int) $datatable['pagination']['page'] : 1;
        $perpage = !empty($datatable['pagination']['perpage']) ? (int) $datatable['pagination']['perpage'] : 50;
        $sort = !empty($datatable['sort']['sort']) ? $datatable['sort']['sort'] : 'desc';
        $field = !empty($datatable['sort']['field']) ? $datatable['sort']['field'] : 'CODE';

        $url = config('app.api') . 'category?mod=list_category';

        $arrnew = $this->getListData($url);
        $total = 10;
        $data = $arrnew['data'];
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
        echo json_encode($result, JSON_PRETTY_PRINT);
    }

    /**
     * [configDataRequest description]
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function configDataRequest($data, $mod = 'insert_category')
    {
        return [
            'mod' => $mod,
            'Code' => isset($data['Code']) ? $data['Code'] : '',
            'Title_Seo' => isset($data['Title_Seo']) ? $data['Title_Seo'] : '',
            'Description_Seo' => isset($data['Description_Seo']) ? $data['Description_Seo'] : '',
            'Parent_Code' => isset($data['Parent_Code']) ? $data['Parent_Code'] : '',
        ];
    }

    /**
     * [checkExistCode description]
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @param  [type] $code [description]
     * @return [type]       [description]
     */
    public function checkExistCode($code)
    {
        $urlConApi = config('app.api') . 'category?mod=list_category';

        $result = $this->getListCategory($urlConApi);

        foreach ($result as $key => $value) {
            if ($code == $value['Code']) {
                return true;
            }
        }

        return false;
    }
}
