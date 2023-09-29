<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Http\Request;
use DB;
use Helper;
class ManageUserController extends Controller
{
    public function manage_user_create(){
        
       
        $country= Country::all();
        // dd($country);
        
        return view('backend.manageuser.adduser',compact('country'));
    
     
     
    }


  

    public function manage_user_store(Request $request){

        

        $email = User::where('email',$request['email'])->first();
       if($email){
          return redirect()
          ->route('createuser')
          ->with('error', 'Email is already exists.')->withInput();
       }
    

    $request->validate([

    'name' => 'required',
    'email' => 'required',
    'password'=>'required',
    'mobilenumber'=>'required|digits:10',
    'address'=>'required',
    'country_id'=>'required',
    'state_id'=>'required',
    'city_id'=>'required',
    'status'=>'required',
  


 ]);

 
    $data= User::create([
      
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
    // return redirect('indexreview');
      return redirect((url('createfile')))->withsuccess("user add successfully.");
    // dd($request->all());


}





public function all_user_view(){
    try {
        //code...
   
    
    $users= User::with('getCountry','getState','getCity')->get();
    // dd($users);
        
   
    return view ('backend.manageuser.alluserview',compact('users'));


} catch (\Throwable $th) {
    throw $th;
    return response()->json(["message"=>$th->getmessage()],500);
}


}



public function edit_user($id){

    $user = User::find($id);
    
   $countries=Country::all();
   $states=State::where('country_id',$user->country_id)->get();
   $cities=City::where('state_id',$user->state_id)->get();

   
    return view('backend.manageuser.edituser',compact('id','user','countries','states','cities'));
    
}
    public function manage_user_update(Request $request,$id)
    { 
        
        try {        

            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'mobilenumber'=>'required|digits:10',
                'address'=>'required',
                'country_id'=>'required',
                'state_id'=>'required',
                'city_id'=>'required',
                'status'=>'required',
            ]);        
        
            $details= User::where('id',$id)->first();
           
            $details->name = $request->name;
            $details->email = $request->email;
            $details->mobilenumber = $request->mobilenumber;
            $details->address = $request->address;
            $details->country_id = $request->country_id;
            $details->state_id = $request->state_id;
            $details->city_id = $request->city_id;
            $details->status = $request->status;
            
            $details->update();

        

        return redirect(route('useredit',$id))->withsuccess("user update successfully.");

        
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    

    public function manage_user_delete($id){
       $user = User::whereId($id)->delete();
        return redirect((route('allUsers')))->withSuccess("User deleted successfully.");


        // if ($user) {
        //     return back()->with('success', 'Success! User deleted');
        // }
        // else {
        //     return back()->with('failed', 'Failed! User not deleted');
        // }

    
        
    }
    
  
    // public function getstate(Request $request) {
    //     $state = State::where('country_id', '=', $request->country_id)->orderBY('name', 'asc')->get('name','id');
    //     return response()->json($state);        
    // }
    
    // public function getcity(Request $request) {
    //     // dd($request->state_id);
    //     $city = City::where('state_id', '=', $request->state_id)->orderBY('name', 'asc')->get('name','id');
       
    //     return response()->json($city);
    // }

   

    public function fetchState(Request $request)
    {
        $data= State::where("country_id",'=',$request->country_id)->get(["name","id"]);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data= City::where("state_id",$request->state_id)->get(["name","id"]);
        return response()->json($data);
    }


   



    public function fetchStatedata(Request $request)
    {
        $data= State::where("country_id",'=',$request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchCitydata(Request $request)
    {
        $data= City::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function changeStatus(Request $request)
    {
        $user = User::find($request->user_id);
        // dd($user);
        $user->status = $request->status;
        $user->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }
}