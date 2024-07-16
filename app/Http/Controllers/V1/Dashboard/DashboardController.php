<?php

namespace App\Http\Controllers\V1\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller {

    function __construct() {
        $this->middleware( [ 'auth', 'verified' ] );
    }

    public function index() {
        return view( 'dashboard' );
    }
}