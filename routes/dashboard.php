<?php

use App\Http\Controllers\V1\Categories\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')
        ->group(function(){
            Route::resources([
                'categories' => CategoriesController::class,
            ]);

        }); 
