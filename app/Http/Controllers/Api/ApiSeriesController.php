<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;

class ApiSeriesController extends Controller
{
    public function __construct(private SeriesRepository $seriesRepository)
    {
    }

    public function index(Request $request)
    {
        $series = Series::paginate(10);

        return response()->json([
            'message' => 'Lista de séries recuperada com sucesso!',
            'data' => $series->items()
        ]);
    }

    public function store(SeriesFormRequest $request)
    {
        return response()
            ->json($this->seriesRepository->add($request), 201);
    }

    public function show(int $series)
    {
        $seriesModel = Series::with('seasons.episodes')->find($series);

        if(!$seriesModel) {
            return response()->json(['message' => 'Series not found'], 404);
        }
        return response()->json(['data' => $seriesModel], 202);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return response()->json([
            'message' => 'Série atualizada com sucesso!',
            'data' => $series
        ]);
    }

    public function destroy(Series $series)
    {
        try{
            $series->delete();

            return response()->json([
                'message' => 'Série removida com sucesso!'
            ], 200);
        } catch (\Exception $error) {
            return response()->json([
                'message' => 'Erro ao remover a série!',
                'error' => $error->getMessage()
            ], 500);
        }
    }
}
