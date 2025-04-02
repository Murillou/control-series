<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Series;
use Illuminate\Http\Request;

class ApiSeriesController extends Controller
{
    public function index(Request $request)
    {
        return Series::all();
    }
}
