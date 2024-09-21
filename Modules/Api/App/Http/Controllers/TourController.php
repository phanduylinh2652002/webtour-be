<?php

namespace Modules\Api\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Tour;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Api\App\Http\Requests\CustomerRequest;

class TourController extends Controller
{

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        $tour = Tour::query()->with(['category', 'guide'])->find($id);
        $tour->image = url('images/' . $tour->image);
        $category_id = $tour->category->id;
        $tour_relate = Tour::query()->with(['category', 'guide'])->where('category_id', $category_id)->get();

        return response()->json([
            'success' => true,
            'data' => $tour,
            'tour_relate' => $tour_relate,
        ]);
    }

    /**
     * @param CustomerRequest $request
     * @return JsonResponse
     */
    public function bookTour(CustomerRequest $request): JsonResponse
    {
        $data = Customer::query()->create($request->validated());

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

}
