<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Mail\SeriesCreated;
use App\Models\Series;
use App\Models\User;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository)
    {
        $this->middleware('auth')->except('index');
    }
    public function index(Request $request)
    {
        $series  = Series::with(['seasons'])->get();
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
        $serie = $this->repository->add($request);
        \App\Events\SeriesCreated::dispatch(
            $serie->id,
            $serie->name,
            $request->seasons,
            $request->episode
        );

        return to_route('series.index')->with('success.message', "Série {$serie->name} adicionada com sucesso.");
    }

    public function edit(Series $series)
    {
        return view('series.edit', compact('series'));
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->update(['name' => $request->input('name')]);

        return to_route('series.index')->with('success.message', "Série {$series->name} foi editada com sucesso.");

    }

    public function destroy(Series $series)
    {
        $series->delete();

        return to_route('series.index')->with('success.message', "Série {$series->name} removida com sucesso");
    }
}
