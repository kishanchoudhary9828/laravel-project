<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use App\Models\User;
use Mail;
class OtpController extends Controller
{
    // Return View of OTP Login Page
    public function otpview()
    {
        return view('auth.otp');
    }



}