<?php
namespace App\Http\Controllers\LoTo\Categories;

use App\Http\Controllers\Controller;

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

    public function edit($code)
    {

        $listParentCode = $this->getListParentCode($code);

        $urlConApi = config('app.api') . 'category?mod=get_category&code=' . $code;
        $resultRep = $this->postApi($urlConApi, [], 'GET');

        $category = isset($resultRep['data']) ? $resultRep['data'] : [];

        return view('lotos.categories.partials.add-category', compact('listParentCode', 'category'));
    }

    /**
     * [getListParentCode description]
     * get list config with total percent form childs < 100
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function getListParentCode($code = null)
    {

        $urlConApi = config('app.api') . 'category?mod=list_category';

        $result = $this->getListData($urlConApi);

        $listParentCode = [];
        if (isset($result['data'])) {
            foreach ($result['data'] as $key => $parentCode) {

                if (!is_null($code) && $code != $parentCode['Code']) {
                    $listParentCode[] = $parentCode['Code'];
                }
            }
        }

        return $listParentCode;
    }
}
