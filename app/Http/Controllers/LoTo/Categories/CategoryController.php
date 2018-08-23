<?php
namespace App\Http\Controllers\LoTo\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 *
 */
class CategoryController extends Controller
{

    /**
     * [index description]
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @return [type] [description]
     */
    public function index()
    {
        return view('lotos.categories.index');
    }

    /**
     * [create description]
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @return [type] [description]
     */
    public function create()
    {
        $listParentCode = $this->getListParentCode();

        return view('lotos.categories.partials.add-category', compact('listParentCode'));
    }

    /**
     * [getData description]
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @return [type] [description]
     */
    public function getData()
    {
        $url = config('app.api') . 'category?mod=list_category';

        return new JsonResponse($this->getListData($url));
    }

    /**
     * [getDataJson description]
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @return [type] [description]
     */
    // public function getDataJson()
    // {
    //     $url = config('app.api') . 'category?mod=list_category';

    //     $result = $this->getListData($url);

    //     if (isset($result['data'])) {
    //         return new JsonResponse($result['data']);
    //     }

    //     return new JsonResponse([]);
    // }
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
        $data = $arrnew;
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
     * [getListParentCode description]
     * get list config with total percent form childs < 100
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function getListParentCode()
    {

        $urlConApi = config('app.api') . 'category?mod=list_category';

        $result = $this->getListData($urlConApi);

        $listParentCode = [];
        if (isset($result['data'])) {
            foreach ($result['data'] as $key => $parentCode) {
                $listParentCode[] = $parentCode['Code'];
            }
        }

        return $listParentCode;
    }
}
