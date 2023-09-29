<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Auth;
use Hash;
class ProfileController extends Controller
{

    
    public function profile(){
        
        $country=Country::get();
        $states= State::where('country_id',Auth::user()->country_id)->get();
        $cities=City::where('state_id',Auth::user()->state_id)->get();
        // dd($cities);
        return view('backend.profile',compact('country','states','cities'));

    }

    public function fetchstate(Request $request){
        $data= State::where('country_id','=',$request->country_id)->get(['name','id']);
    
         return response()->json($data);
    }
    
    public function fetchcity(Request $request){
        
        $data= City::where('state_id',$request->state_id)->get(['name','id']);
        return response()->json($data);
    }

    public function profileupdate(Request $request,$id){
        
        try {
            
      
        $request->validate([

            'name'=>'required',
            'email'=>'required',
            'mobilenumber'=>'required|digits:10',
            'address'=>'required',
            'country_id'=>'required',
            'state_id'=>'required',
            'city_id'=>'required',

        ]);

        $data= User::where('id',$id)->first();
        
        $data->name=$request->name;
        $data->email=$request->email;
        $data->mobilenumber=$request->mobilenumber;
        $data->address=$request->address;
        $data->country_id=$request->country_id;
        $data->state_id=$request->state_id;
        $data->city_id=$request->city_id;

        $data->update();

        return redirect(url('profileview'))->withsuccess('user profile update successfully');
    } catch (\Throwable $th) {
        //throw $th;
    }
    }

    public function changepassword(){
        return view('backend.changepassword');
        
    }
    public function updatepassword(Request $request){
    //   dd($request->all());
         
        $request->validate([
            'password' => 'required',
            'new_password' => 'required',
        ]);


       
        if(!Hash::check($request->password, auth()->user()->password)){
            return redirect(url('adminchangepassword'))->with("error", "Old Password Doesn't match!");
        }


      
        $data=User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
          
        ]);
        
        return back()->with("success", "Password changed successfully!");
}
}
    


