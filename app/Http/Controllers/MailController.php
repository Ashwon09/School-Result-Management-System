<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    //

    public function mail(Request $request)
    {
        // dd($request->all());
        $data = [
            'name' => $request->name,
            'address' => $request->address,
            'dob' => $request->dob,
            'from'=>'ABCD@gmail.com'
        ];
        // dd($data);
        Mail::to($request->email)->send(new WelcomeMail($data));


        return new WelcomeMail($data);
    }

    public function form()
    {
        return view('email');
    }
}
