<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\LoginAlertMail;
use Illuminate\Support\Facades\Mail;


class LoginController extends Controller
{
  /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

  use AuthenticatesUsers;

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  // protected $redirectTo = RouteServiceProvider::HOME;

  /**
   * Create a new controller instance.
   *
   * @return void
   */


  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  public function redirectTo()
  {
    $role = Auth::user()->role;
    $email = Auth::user()->email;
    $time = date('Y-m-d H:i:s');


    switch ($role) {
      case 'admin':
        return '/admin';
        break;
      case 'student':
        Mail::to($email)->send(new LoginAlertMail($time));
        return '/student-details';
        break;
      default:
        Mail::to($email)->send(new LoginAlertMail($time));
        return '/home';
        break;
    }
  }


  public function customLogin(Request $request)
  {
    // dd($request->all());
    $this->validateLogin($request);
    $user = $request->email;
    $password = $request->password;

    if (Auth::attempt(['email' => $user, 'password' => $password])) {
      return response()->json([[1]]);
    } else {
      return response()->json([[3]]);
    }
  }
}
