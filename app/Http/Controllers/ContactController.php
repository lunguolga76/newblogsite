<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function send(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);

        if($request->method()=='POST'){
            $body ="<p><b>Email:</b>{$request->input('email')}</p>";
            Mail::to('lunguolga2000@yahoo.com')->send(new TestMail($body));
            $request->session()->flash('success','Email was sent');
            return redirect('/');
        }

        return view('send');
    }
}
