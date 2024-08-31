<?php

namespace Modules\Cms\App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('Cms::auth.login');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            if(Auth::user()->role_id === 1 || Auth::user()->role_id === 2){
                return redirect()->route('dashboard');
            }
            return redirect('/');
        }
        return redirect()->back()->with('error', 'Sai tài khoản hoặc mật khẩu');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(url('/login'));
    }
}
