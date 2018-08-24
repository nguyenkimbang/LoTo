<?php
namespace App\Http\Controllers\Api\LoTo\Categories\Posts;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 *
 */
class PostController extends Controller
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
        //
        // dd($request->all());

        $dataReq = $this->configDataRequest($request->all());

        $url = config('app.api') . 'posts';

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
        $dataReq = $this->configDataRequest($request->all(), 'update_post');

        $url = config('app.api') . 'posts';

        return new JsonResponse($this->postApi($url, $dataReq, 'PUT'));
    }

    public function getData()
    {
        $url = config('app.api') . 'posts?mod=list_post';

        return $this->getDataJson($url);
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
        $url = config('app.api') . 'posts?mod=delete_post&id=' . $request->ID;

        return new JsonResponse($this->postApi($url, [], 'DELETE'));
    }

    /**
     * [configDataRequest description]
     *
     * @author [Nguyen Kim Bang] <[<nguyenkimbang208@gmail.com>]>
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function configDataRequest($data, $mod = 'insert_post')
    {
        return [
            'mod' => $mod,
            'Title' => isset($data['Title']) ? $data['Title'] : '',
            'Content' => isset($data['Content']) ? $data['Content'] : '',
            'Category_Code' => isset($data['Category_Code']) ? $data['Category_Code'] : '',
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
