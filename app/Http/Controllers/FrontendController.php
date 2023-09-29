<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use App\Models\Contact;
class FrontendController extends Controller
{
    public function frontview(){
        $blog=Blog::all();
        $number=User::where('id','1')->get('mobilenumber');
        // dd($number);
        return view('frontend.index',compact('blog','number'));
    }

    public function contectview(){
        return view('frontend.contactus');
    }

    public function usstore(Request $request){
        
        
        $data= Contact::create([
           
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
        ]);
        

        return redirect((url('contectus')))->withsuccess('successfully add your information');
    }

    public function viewcontect(){
        $conn=Contact::all();
        return view('frontend.contactview',compact('conn'));
    }
}
