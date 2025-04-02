<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/series', [\App\Http\Controllers\Api\ApiSeriesController::class, 'index']);

