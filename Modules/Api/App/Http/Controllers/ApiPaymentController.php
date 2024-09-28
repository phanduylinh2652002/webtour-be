<?php

namespace Modules\Api\App\Http\Controllers;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\BillDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ApiPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function paid()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'message' => 'Vui lòng đăng nhập để xem chức năng này.'
            ], 401);
        }

        $bills = BillDetail::where('customer_id', $user->id)
                 ->where('status', Status::CHECK_OUT->value)
                 ->get();

        return response()->json([
            'message' => 'Success',
            'data' => $bills
    ]);
    }

    public function unpaid()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'message' => 'Vui lòng đăng nhập để xem chức năng này.'
            ], 401);
        }

        $bills = BillDetail::where('customer_id', $user->id)
                 ->where('status', Status::PENDING->value)
                 ->get();

        return response()->json([
            'message' => 'Success',
            'data' => $bills
    ]);
    }
}
