<?php
namespace App\Http\Controllers\LoTo;

use App\Http\Controllers\Controller;

/**
 *
 */
class DashboardController extends Controller
{

    public function index()
    {
        $this->_startSession();

        return view('lotos.index');
    }
}
