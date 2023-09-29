<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use App\Models\Country;

class ApiRegisterController extends Controller
{
    public function registeruser(Request $request){
        // dd($request->all());
         try {
           $data= User::where('email',$request->email)->first();
        //   dd($data);
           if($data){
            return response()->json(['status'=>401,'message'=>'email already exist'],401);
           }

          
        
        $validator=Validator::make($request->all(),
    
        [
            
            'name'=>'required',
            'email'=>'required|unique',
            'password'=>'required',
            'mobilenumber'=>'required',
            'address'=>'required',
            'country_id'=>'required',
            'state_id'=>'required',
            'city_id'=>'required',
            'status'=>'required',


        ]);

        // dd($validator);

        $user= User::create([
        
           
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'mobilenumber'=>$request->mobilenumber,
            'address'=>$request->address,
            'country_id'=>$request->country_id,
            'state_id'=>$request->state_id,
            'city_id'=>$request->city_id,
            'status'=>$request->status,

        ]);
        
        // dd($user);

       return response()->json(['status'=>200,'message'=>'user successfully register','data'=>$user ]);
    } catch (\Throwable $th) {
        return response()->json(['message'=>$th->getmessage()],500);
     }
    }

}
