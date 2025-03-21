<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        Serie::create($request->all());
        $request->session()->flash('success.message', 'Série adicionada com sucesso.');

        return to_route('series.index');

    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->series);
        $request->session()->flash('success.message', 'Série removida com sucesso');

        return to_route('series.index');
    }
}
