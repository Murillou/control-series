<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/series', \App\Http\Controllers\Api\ApiSeriesController::class);

