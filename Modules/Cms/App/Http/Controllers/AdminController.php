<?php

namespace Modules\Cms\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('Cms::admin.dashboard');
    }
}
