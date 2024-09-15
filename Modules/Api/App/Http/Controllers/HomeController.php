<?php

namespace Modules\Api\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tour = Tour::query()->limit(3)->get();
        $tour->map(function ($tour) {
            $tour->image = url('images/' . $tour->image);
            return $tour;
        });

        return response()->json($tour);
    }


}
