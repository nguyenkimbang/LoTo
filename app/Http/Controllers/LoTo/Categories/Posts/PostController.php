<?php
namespace App\Http\Controllers\LoTo\Categories\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 *
 */
class PostController extends Controller
{

    /**
     * [index description]
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @return [type] [description]
     */
    public function index()
    {
        return view('lotos.categories.posts.index');
    }

    /**
     * [create description]
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @return [type] [description]
     */
    public function create()
    {
        $listCategory = $this->getListParentCode();

        return view('lotos.categories.posts.partials.add-post', compact('listCategory'));
    }

    /**
     * [create description]
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @return [type] [description]
     */
    public function edit($id)
    {

        $listCategory = $this->getListParentCode();

        $urlConApi = config('app.api') . 'posts?mod=get_post&id=' . $id;

        $resultRep = $this->postApi($urlConApi, [], 'GET');

        $post = isset($resultRep['data']) ? $resultRep['data'] : [];

        return view('lotos.categories.posts.partials.add-post', compact('post', 'listCategory'));
    }

    /**
     * [getData description]
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @return [type] [description]
     */
    public function getData($categoryCode)
    {
        $url = config('app.api') . 'posts?mod=list_post&category_code=' . $categoryCode;

        return new JsonResponse($this->getListData($url));
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
