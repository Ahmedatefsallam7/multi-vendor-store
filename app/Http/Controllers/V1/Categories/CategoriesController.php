<?php

namespace App\Http\Controllers\V1\Categories;

use App\Models\Category;
use App\Http\Controllers\Controller;
use function App\Helpers\attachFile;
use App\Http\Requests\Categories\StoreCategoriesRequest;
use App\Http\Requests\Categories\UpdateCategoriesRequest;
use App\Http\Controllers\Actions\Categories\StoreCategoryAction;
use App\Http\Controllers\Actions\Categories\UpdateCategoryAction;

class CategoriesController extends Controller {

    function __construct(
        private StoreCategoryAction $storeCategoryAction,
        private UpdateCategoryAction $updateCategoryAction,
    ) {
        $this->storeCategoryAction = $storeCategoryAction;
        $this->updateCategoryAction = $updateCategoryAction;
    }

    function index() {
        $categories = Category::latest()->simplePaginate( 5 );
        return view( 'dashboard/categories/index', get_defined_vars() );
    }

    function create() {

        $parents = Category::all();
        return view( 'dashboard/categories/create', [
            'parents' => $parents
        ] );
    }

    function store( StoreCategoriesRequest $request ) {

        // Data Setup
        $data = $this->unsetNullValues( $request->all() );
        // Store
        $category = $this->storeCategoryAction->execute( $data );

        // helper method to upload file
        attachFile( $category, $request, 'image' );

        // notify
        $this->alerting( 'Add', 'New Category Added Successfully' );

        // Response
        return to_route( 'categories.index' );

    }

    function update( UpdateCategoriesRequest $request, Category $category ) {

        // Data Setup
        $data = $this->unsetNullValues( $request->all() );

        if ( $request->hasFile( 'image' ) ) {
            if ( file_exists( $category->image ) ) {
                unlink( $category->image );
            }
            $this->updateCategoryAction->execute( $category, $data );
            attachFile( $category, $request, 'image' );
        } else {
            $this->updateCategoryAction->execute( $category, $data );
        }

        $this->alerting( 'Edit', 'Category Updated Successfully' );

        // Response
        return to_route( 'categories.index' );
    }

    function destroy( Category $category ) {

        // Safely delete the image if it exists
        if ( $category->image && file_exists( $category->image ) ) {
            unlink( $category->image );
        }

        $category->delete();
        $this->alerting( 'Delete', 'Category Deleted Successfully' );
        return to_route( 'categories.index' );

    }

}