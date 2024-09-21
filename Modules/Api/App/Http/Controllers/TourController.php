<?php

namespace Modules\Api\App\Http\Controllers;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Customer;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
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
        DB::transaction(function () use ($request) {
            $customers = Customer::query()->firstOrCreate([
                'phone' => $request->customer['phone'],
                'email' =>  $request->customer['email'],
            ], [
                'name' =>  $request->customer['name'],
            ]);

            $bill = new Bill;
            $bill->customer_id = $customers->id;
            $bill->total = $request->total;
            $bill->date = now();
            $bill->user_id = $request->user['id'];
            $bill->save();

            $number = filter_var($request->tour['dateEnd'], FILTER_SANITIZE_NUMBER_INT);
            $date = Carbon::parse('2024-09-22');
            $date_end = $date->addDays($number);

            $billDetails = new BillDetail;
            $billDetails->bill_id = $bill->id;
            $billDetails->tour_id = $request->tour['id'];
            $billDetails->customer_id = $customers->id;
            $billDetails->date_start = $request->customer['date'];
            $billDetails->date_end = $date_end->toDateString();
            $billDetails->price = $request->tour['price'];
            $billDetails->discount = $request->tour['discount'];
            $billDetails->quantity_OldPerson = $request->customer['quantity_OldPerson'];
            $billDetails->quantity_YoungPerson = $request->customer['quantity_YoungPerson'] ?? 0;
            $billDetails->quantity_Children = $request->customer['quantity_Children'] ?? 0;
            $billDetails->quantity_Infant = $request->customer['quantity_Infant'] ?? 0;
            $billDetails->note = $request->customer['note'] ?? '';
            $billDetails->status = Status::PENDING->value;
            $billDetails->save();
        });

        return response()->json([
            'success' => true,
        ]);
    }

}
