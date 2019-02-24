<?php

namespace App\Http\Controllers\EmployeeAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/employee/home';

    public function __construct()
    {
        $this->middleware('guest:employee')->except('index');
    }

    public function index()
    {
        return view('home');
    }

    public function showLoginForm()
    {
        return view('employee-auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('employee')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            return redirect()->intended(route('employee.home'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
