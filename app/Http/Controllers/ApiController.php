<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\State;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Validator;
class ApiController extends Controller
{

    public function getuser(){
    try {
        //code...
   
    $user=User::with('getCountry:id,name')->get();
    
    

    //  $user=User::join("countries", "countries.id", "=", "users.country_id")
    // ->get();

   

    return response()->json([$user]);
    
} catch (\Throwable $th) {
    //throw $th;
}
    }
    



    
    public function user_store(Request $request){
        
    //    dd($request->all());

    try {
        //code...

        $email= User::where('email',$request['email'])->first();
        
        
        if($email){
            
            return response()->json(['status'=>401,'message'=>'Email already exist'],401);
        }
   
         $data=$request->all();
        $validator=Validator::make($data,[

            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'mobilenumber'=>'required',
            'address'=>'required',
            'country_id'=>'required',
            'state_id'=>'required',
            'city_id'=>'required',
            'status'=>'required',
            'image'=>'required',


        ]);
    
    
    // $image = $request->file('image');
    // dd($image);
    // $new_name = rand().'.'.$image->getClientOriginalExtension();
    // $image->move('uploadImage', $new_name);
       
  
        $image = $request->file('image');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move('uploadImage', $new_name);
        $image_path = $new_name;
    
    
        $data= User::create([
            'image'=>$image_path,
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
            
          
          
            return response()->json(['status'=>200,'message'=>'insert successfully','data'=>$data]);

        } catch (\Throwable $th) {
            // throw $th;
            return response()->json(['status'=>false,'message'=>$th->getmessage()],500);
           
            // return $th->getMessage();
            
         
        }
          
        

    }

    public function user_edit($id){
        
        $data=array();

        $data['user']= User::find($id);
    
        $data['country']= Country::where('id',$data['user']->country_id)->get(['id','name']);
        $data['state']=State::where('id',$data['user']->state_id)->get(['id','name']);
        $data['city']=City::where('id',$data['user']->city_id)->get(['id','name']);

       return response()->json([$data]);
    
        
    }

    public function user_update(Request $request,$id){
      
    //    dd($request->all());
          try {
            //code...
       $images = User::find($id);

    //    if($request->hasfile('image')){
    //     $details= 'uploadImage/'.$images->image;        
    //     unlink($details);
      
    //   } else {
    //     $image_path = $data->image;
    //   }
          
        
  
    $data = $request->all();

    $validator = Validator::make($data, [
        'name' => 'required',
        'email'=>'required',
        // 'password'=>'required',
        'mobilenumber'=>'required',
        'address'=>'required',
        'country_id'=>'required',
        'state_id'=>'required',
        'city_id'=>'required',
        'status'=>'required',
        'image'=>'required',

        ]);
        
    if($validator->fails()) {
        return response()->json([
            'status_code' => 400,
            'response' => 'Error',
            'message' => $validator->messages()->all(),
        ],400);
        }  
         if($request->hasfile('image')){ 
          $details='uploadImage/'.$images->image;
          unlink($details);
          $image = $request->file('image');
          $new_name = rand().'.'.$image->getClientOriginalExtension();
          $image->move('uploadImage', $new_name);
          $image_path = $new_name;
         }else{
          $image_path=$images->image;
         } 
   
          


        $data=User::where('id',$id)->with('getCountry:id,name','getState:id,name','getCity:id,name')->first();
  
       
        $data->name=$request->name;
        $data->email=$request->email;
        $data->mobilenumber=$request->mobilenumber;
        $data->address=$request->address;
        $data->country_id=$request->country_id;
        $data->state_id=$request->state_id;
        $data->city_id=$request->city_id;
        $data->status=$request->status;
        $data->image=$image_path;
    
        $data->update();

        

          
        return response()->json(['status'=>200,'message'=>'update successfully','data'=>$data]);
    } catch (\Throwable $th) {
        //throw $th;
        return response()->json(['status'=>500,'message'=>$th->getmessage()],500);
      }      
    
        
        
    }

    public function user_destroy($id){
     
        $user=User::find($id)->delete();
         
        return response()->json(['status'=>200,'message'=>'deleted successfully']);
    }
}
