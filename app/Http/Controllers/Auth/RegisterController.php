<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Models\StudentRegistrationRequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'contact_number' => 'max:14',
            'dob' => 'required',
            'gender' => 'required',
            'class' => 'required',
            'father_name' => 'required|max:30',
            'province' => 'required',
            'district' => 'required',
            'address' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['first_name'].' '.$data['last_name'],
            'email' => $data['email'],
            'role' => 'temp_student',
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        // dd($request->all());
        $this->validator($request->all());
        // dd($request->all());
        event(new Registered($user = $this->create($request->all())));

        StudentRegistrationRequest::create([
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->input('last_name'),
            'contact_number' => $request->input('contact_number'),
            'email' => $request->input('email'),
            'dob' => $request->input('dob'),
            'gender' => $request->input('gender'),
            'class' => $request->input('class'),
            'father_name' => $request->input('father_name'),
            'province' => $request->input('province'),
            'district' => $request->input('district'),
            'address' => $request->input('address'),
        ]);

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }
}
