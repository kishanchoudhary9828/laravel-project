<?php

namespace App\Http\Controllers;

use App\Mail\sendmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function view(){
        return view('welcomes');
        
    }

    // public function send(Request $request){

    //     Mail::to($request->email)->send(new sendmail($request->title,$request->content));
    //     return back();
    // }
}