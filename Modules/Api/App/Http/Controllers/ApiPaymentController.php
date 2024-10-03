<?php

namespace Modules\Api\App\Http\Controllers;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Bill;
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

        $bills = Bill::query()->with(['order', 'order.tour'])
            ->where('user_id', $user->id)
            ->whereHas('order', function ($query) {
                return $query->where('status', Status::CHECK_OUT->value);
            })
            ->orderByDesc('updated_at')
            ->get();

        return response()->json($bills);
    }

    public function unpaid()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'message' => 'Vui lòng đăng nhập để xem chức năng này.'
            ], 401);
        }

        $bills = Bill::query()->with(['order', 'order.tour'])
            ->where('user_id', $user->id)
            ->whereHas('order', function ($query) {
                return $query->where('status', '!=', Status::CHECK_OUT->value);
            })
            ->orderByDesc('updated_at')
            ->get();

        return response()->json($bills);
    }
}
