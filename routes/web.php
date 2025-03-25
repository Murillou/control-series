<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Requests\SeriesFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/series');
});

Route::resource('/series', SeriesController::class)
    ->except('show')
    ->names([
        'index' => 'series.index',
        'create' => 'series.create',
        'store' => 'series.store',
        'edit' => 'series.edit',
        'update' => 'series.update',
        'destroy' => 'series.destroy'
]);

Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');
Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name(name: 'episodes.index');
Route::post('/seasons/{season}/episodes',[EpisodesController::class, 'update'])->name('episodes.update'); 


