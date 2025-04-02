<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Series;
use Illuminate\Http\Request;

class ApiSeasonsController extends Controller
{
    public function index(Series $series)
    {
        return response()->json(['data' => $series->seasons()->get()], 202);
    }
}
