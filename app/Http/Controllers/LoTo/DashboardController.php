<?php
namespace App\Http\Controllers\LoTo;

use App\Http\Controllers\Controller;

/**
 *
 */
class DashboardController extends Controller
{

    public function __construct()
    {
        // $this->_getApi();
        //       $this->_getToken();
    }

    public function index()
    {
        return view('lotos.index');
    }
}
