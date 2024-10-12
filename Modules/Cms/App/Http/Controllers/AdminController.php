<?php

namespace Modules\Cms\App\Http\Controllers;

use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $month = Bill::query()
            ->with(['order'])
            ->whereHas('order', function ($query) {
                $query->where('status', Status::CHECK_OUT->value);
            })
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('total');

        $newUsersCount = User::query()
            ->where('role_id', 3)
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();

        return view('Cms::admin.dashboard', compact('month', 'newUsersCount'));
    }
}
