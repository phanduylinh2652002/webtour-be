<?php

namespace Modules\Api\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Tour;
use App\Models\TourGuide;
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

    public function limitTours()
    {
        $tours = Tour::query()->limit(9)->orderByDesc('price')->get();
        $tours->map(function ($tour) {
            $tour->image = url('images/' . $tour->image);
            return $tour;
        });

        return response()->json($tours);
    }

    public function info()
    {
        $tours = Tour::query()->count();
        $tourGuide = TourGuide::query()->count();
        $customers = Customer::query()->count();

        return response()->json(compact('tours', 'tourGuide', 'customers'));
    }

    public function tourDomestic()
    {
        $tour = Tour::where('category_id', '1')->limit(6)->get();
        $tour->map(function ($tour) {
            $tour->image = url('images/' . $tour->image);
            return $tour;
        });

        return response()->json($tour);
    }
}
