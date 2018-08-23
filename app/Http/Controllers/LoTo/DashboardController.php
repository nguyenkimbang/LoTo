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
        $this->_setToken();
    }

    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        return view('lotos.index');
    }
}
