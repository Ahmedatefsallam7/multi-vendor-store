<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\Dashboard\DashboardController;

Route::get( 'dashboard', [ DashboardController::class, 'index' ] )->name( 'dashboard.index' );