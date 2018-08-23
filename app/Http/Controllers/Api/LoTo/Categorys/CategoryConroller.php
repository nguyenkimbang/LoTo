<?php
namespace App\Http\Controllers\Api\LoTo\Categorys;

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
        return new JsonResponse([]);
    }
}
