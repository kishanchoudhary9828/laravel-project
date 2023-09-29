<?php

namespace App\Http\Controllers\Auth;
use Validator;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendmail;
// use sendEmail;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginUserController extends Controller
{
    public function newlogin(){
     return view('auth.loginuser');        
    }

    public function newloginuser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not match with our record.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            //  return redirect((url('viewotp')))->withsuccess('successfully');

    
    //   dd($request->all());
           $otp = rand(1000,9999);
        //    dd($otp);
           $user = User::where('email','=',$request->email)->update(['otp' => $otp]); 
        //    dd($user);
           if($user){
           // send otp in the email
           
        //   dd( $mail_details);
            Mail::to($request->email)->send(new sendmail($otp));
          
            return redirect((url('viewotp')));
           }
           else{
               return response(["status" => 401, 'message' => 'Invalid']);
           }

        

    } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage()
        ], 500);
    }
    
}
public function verifyOtp(Request $request){
    // dd($request->all());
    $user  = User::where([['email','=',$request->email],['otp','=',$request->otp]])->first();
    //  dd($user);
    if($user){
        auth()->login($user, true);
        User::where('email','=',$request->email)->update(['otp' => $request->otp]);
        $accessToken = auth()->user()->createToken('authToken')->accessToken;

       return redirect((url('home')));
    }
    else{
        return response(["status" => 401, 'message' => 'Invalid']);
    }
}

}