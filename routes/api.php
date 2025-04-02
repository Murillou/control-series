<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::apiResource('/series', \App\Http\Controllers\Api\ApiSeriesController::class);
//Route::apiResource('/seasons', \App\Http\Controllers\Api\ApiSeasonsController::class);
//Route::apiResource('/episodes', \App\Http\Controllers\Api\ApiEpisodesController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/series', \App\Http\Controllers\Api\ApiSeriesController::class);

    Route::apiResource('/series/{series}/seasons', \App\Http\Controllers\Api\ApiSeasonsController::class);

    Route::apiResource('/series/{series}/episodes', \App\Http\Controllers\Api\ApiEpisodesController::class);
    Route::apiResource('/episodes', \App\Http\Controllers\Api\ApiEpisodesController::class);
});


Route::apiResource('/login', \App\Http\Controllers\Api\ApiLoginController::class);
