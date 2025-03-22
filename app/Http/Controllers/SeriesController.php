<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series  = Serie::query()->orderBy('name')->get();
        $successMessage = session('success.message');

        return view('series.index')
        ->with('series', $series)
        ->with('successMessage', $successMessage);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Serie::create($request->all());

        return to_route('series.index')->with('success.message', "Série {$serie->name} adicionada com sucesso.");

    }

    public function edit(Serie $series)
    {
        dd($series->seasons);
        return view('series.edit', compact('series'));
    }

    public function update(Serie $series, SeriesFormRequest $request)
    {
        $series->update(['name' => $request->input('name')]);

        return to_route('series.index')->with('success.message', "Série {$series->name} foi editada com sucesso.");

    }

    public function destroy(Serie $series)
    {
        $series->delete();

        return to_route('series.index')->with('success.message', "Série {$series->name} removida com sucesso");
    }
}
