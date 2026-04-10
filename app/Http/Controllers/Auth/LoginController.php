<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Role based redirect after login
     */
    protected function authenticated($request, $user)
    {
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->hasRole('staff')) {
            return redirect()->route('staff.dashboard');
        }

        return redirect('/home');
    }

    /**
     * Logout override 
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
