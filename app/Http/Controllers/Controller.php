<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
    use AuthorizesRequests, ValidatesRequests;

    public function unsetNullValues( array $data ) {
        return array_filter( $data, fn ( $val ) => $val !== null || $val !== false || $val !== '' );
    }

    function alerting( $type, $message ) {
        return  session()->flash( $type, $message );
    }
}