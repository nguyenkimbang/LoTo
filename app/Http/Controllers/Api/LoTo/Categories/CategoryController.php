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


    /**
     * [getData description]
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @return [type] [description]
     */
    public function getData()
    {

        $url = config('app.api') . 'category?mod=list_category';

        return $this->getDataJson($url);
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
