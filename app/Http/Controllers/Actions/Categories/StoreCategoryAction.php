<?php

namespace App\Http\Controllers\Actions\Categories;

use App\Models\Category;
use Illuminate\Support\Str;

class StoreCategoryAction {

    function execute( $data ) {
        $data[ 'slug' ] = Str::slug( $data[ 'name' ] );
        return Category::create( $data );
    }

}
