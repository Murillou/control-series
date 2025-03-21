<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/series');
});

Route::resource('/series', SeriesController::class)->names([
    'index' => 'series.index',
    'create' => 'series.create',
    'store' => 'series.store'
]);
