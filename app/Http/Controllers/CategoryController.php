<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Models\Category;
class CategoryController extends Controller 
{
    public function addcategory(){
        $dropcategory= Category::where('parent_id',0)->get();
        // $subcategory= Category::get();
      
        return view('backend.category.Addcategory',compact('dropcategory'));


   
        
    }

    public function categorystore(Request $request)
    {
        try {
            $title=Category::where('title',$request['title'])->first();
            if($title){
                return redirect(url('categoryadd'))->witherror('title already exits')->withInput();
            }

            $validator=Validator::make($request->all(),
                                        [
                                            'title'=>'required|unique',
                                            'description'=>'required',
                                            'status'=>'required',
                                            'image'=>'required'
                                        ]);

            if($validator->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validator->errors()
                ], 401);
            }



            $image = $request->file('image');
            $new_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move('uploadImage', $new_name);
            
            $data=Category::create([
                
                'title'=>$request->title,
                'description'=>$request->description,
                'status'=>$request->status,
                'image'=>$new_name,
                'parent_id'=>$request->parent_id,
                'sub_category'=>$request->sub_category,
            ]);



            
            //   dd($data);
            return redirect('categoryadd')->withsuccess('category successfully add');


        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>$th->getmessage()]);
        }

    }
    public function viewcategory(){
     
    try {
     
        $category=Category::where('parent_id',0)->get();
        return view('backend.category.viewcategory',compact('category'));




    } 
    catch (\Throwable $th) {
        return response()->json(['message'=>$th->getmessage()]);
    }
    }


    public function subcategory(Request $request){
        $data=$request->all();
        $data=Category::where('parent_id',$data['category_sub'])->get(['sub_category','id']);
        // dd($data);
        return response()->json($data);
    }

    public function changecateStatus(Request $request)
    {

        $user = Category::find($request->user_id);
        // dd($user);   
        $user->status = $request->status;
        $user->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }

}
