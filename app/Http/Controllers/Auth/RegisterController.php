<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use Helper;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
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

        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'mobilenumber'=>$data['mobilenumber'],
            'address'=>$data['address'],
            'country_id'=>$data['country_id'],
            'state_id'=>$data['state_id'],
            'city_id'=>$data['city_id'],
            
           
        ]); 
      
       return  $user->assignRole($data['role']);

        
      
    }
  public function getstatename(Request $request){
    
   
    $data=State::where('country_id','=',$request->country_id)->get(['name','id']);

    
    return response()->json($data);
  
  }
    
  public function getcityname(Request $request){
    
    $data=City::where('state_id',$request->state_id)->get(['name','id']);

    
    return response()->json($data);
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
