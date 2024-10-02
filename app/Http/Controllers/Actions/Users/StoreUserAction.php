<?php

namespace  App\Http\Controllers\Actions\Users;

use App\Models\User;

class StoreUserAction {

    function execute( array $data ): User {
        return  User::create( $data );
    }

}
