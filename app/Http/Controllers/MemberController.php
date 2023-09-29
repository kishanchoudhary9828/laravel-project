<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use Validator;
class MemberController extends Controller
{
    public function memberview(){
        return view('backend.School.AllUserAdd.addmember');
    }

    public function studentstore(Request $request){
        try {
         
           $validator=Validator::make($request->all(),[
   
                  'name'=>'required',
                  'email'=>'required|unique',
                  'password'=>'required',
                  'Address'=>'required',
                  'user_type'=>'required',

           ]);
           

           $data=School::create([
             
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'address'=>$request->address,
            'user_type'=>$request->user_type
           ]);
            
        //    dd($data);
            return redirect(url('memberviews'))->withsuccess('successfully data add');
        } catch (\Throwable $th) {
           return response()->json(['message'=>$th->getmessage()]);
        }
       
   
   }
}

