<?php

namespace App\Http\Controllers\Actions\Categories;

use App\Models\Category;
use Illuminate\Support\Str;

class UpdateCategoryAction {

    function execute( $category, $data ) {

        $data[ 'slug' ] = Str::slug( $data[ 'name' ] );
        return $category->update( $data );
    }

}
