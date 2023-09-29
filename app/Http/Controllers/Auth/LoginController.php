<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }











    // public function requestOtp(Request $request)
    // {
   
    //        $otp = rand(1000,9999);
    //        Log::info("otp = ".$otp);
    //        $user = User::where('email','=',$request->email)->update(['otp' => $otp]);
   
    //        if($user){
    //        // send otp in the email
    //        $mail_details = [
    //            'subject' => 'Testing Application OTP',
    //            'body' => 'Your OTP is : '. $otp
    //        ];
          
    //         \Mail::to($request->email)->send(new sendEmail($mail_details));
          
    //         return response(["status" => 200, "message" => "OTP sent successfully"]);
    //        }
    //        else{
    //            return response(["status" => 401, 'message' => 'Invalid']);
    //        }
       }
   
   
    //    public function verifyOtp(Request $request){
         // public function requestOtp(Request $request)
    // {
   
    //        $otp = rand(1000,9999);
    //        Log::info("otp = ".$otp);
    //        $user = User::where('email','=',$request->email)->update(['otp' => $otp]);
   
    //        if($user){
    //        // send otp in the email
    //        $mail_details = [
    //            'subject' => 'Testing Application OTP',
    //            'body' => 'Your OTP is : '. $otp
    //        ];
    //        $user  = User::where([['email','=',$request->email],['otp','=',$request->otp]])->first();
    //        if($user){
    //            auth()->login($user, true);
    //            User::where('email','=',$request->email)->update(['otp' => null]);
    //            $accessToken = auth()->user()->createToken('authToken')->accessToken;
   
    //            return response(["status" => 200, "message" => "Success", 'user' => auth()->user(), 'access_token' => $accessToken]);
    //        }
    //        else{
    //     
    //         \Mail::to($request->email)->send(new sendEmail($mail_details));
          
    //         return response(["status" => 200, "message" => "OTP sent successfully"]);
    //        }
    //        else{
    //            return response(["status" => 401, 'message' => 'Invalid']);
    //        }
    //    }
   
   
    //    public function verifyOtp(Request $request){
       
    //        $user  = User::where([['email','=',$request->email],['otp','=',$request->otp]])->first();
    //        if($user){
    //            auth()->login($user, true);
    //            User::where('email','=',$request->email)->update(['otp' => null]);
    //            $accessToken = auth()->user()->createToken('authToken')->accessToken;
   
    //            return response(["status" => 200, "message" => "Success", 'user' => auth()->user(), 'access_token' => $accessToken]);
    //        }
    //        else{
    //            return response(["status" => 401, 'message' => 'Invalid']);
    //        }
    //    }            return response(["status" => 401, 'message' => 'Invalid']);
    //        }
        // }
// }
