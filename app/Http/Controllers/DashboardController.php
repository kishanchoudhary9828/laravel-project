<?php

namespace App\Http\Controllers;
use App\Models;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function indexviews(){
        $data = array();
        
        $data['count']= User::count();
        
        $data['active']=User::where('Status',1)->count();
        // dd($data);  
        
        return view('backend.dashboard',compact('data'));
    }

}
