<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Str;
use Session;
class BlogController extends Controller
{


  public function __construct(){
    // dd('vjkfuijh');

}
  public function addblog(){
    return view('backend.blogs.addblog');

}
    public function viewblog(){
      // this code use softdelete
        $data=Blog::onlyTrashed()->get();
        // dd($data) 
        $blog= Blog::orderBy("id", "desc")->cursorPaginate(3);
        echo "Today is " . date("Y/m/d") . "<br>";
        return view('backend.blogs.viewblog',compact('blog'));
       
    }

    public function blogstore(Request $request){
        dd($request->all());
        $request['slug'] = Str::slug($request->title);
      
    // dd($request->all());
   
       $validated= $request->validate([
         
          'title'=>'required',
          'slug'=>'required',
          'sub_heading'=>'required',
          'short_description'=>'required',
          'description'=>'required',
          'status'=>'required',
          'image'=>'required',

        ]);
        
        

        $image = $request->file('image');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move('uploadImage', $new_name);
       
        $data=Blog::create([
           
           'title'=>$request->title,
           'slug'=>$request->slug,
           'sub_heading'=>$request->sub_heading,
           'short_description'=>$request->short_description,
           'description'=>$request->description,
           'status'=>$request->status,
           'image'=>$new_name,
     
        ]);
        
        return back()->withsuccess('data successfully store');
    
    }
     
    public function editblog($id){

        $blog= Blog::find($id);
        
        return view('backend.blogs.editblog',compact('id','blog'));
        
    }

    public function updateblog(Request $request,$id){
            $data= Blog::find($id);            
        
          if($request->hasfile('image')){
            $details= 'uploadImage/'.$data->image;        
            unlink($details);
            $image = $request->file('image');
            $new_name = rand().'.'.$image->getClientOriginalExtension();
            $image->move('uploadImage', $new_name);
            $image_path = $new_name;
          } else {
            $image_path = $data->image;
          }

        

          $data= [             
            'title'=>$request->title,
            'slug'=>Str::slug($request->slug),
            
            'sub_heading'=>$request->sub_heading,
            'short_description'=>$request->short_description,
            'description'=>$request->description,
            'status'=>$request->status,
            'image'=>$image_path,      
         ];

        $result= Blog::whereId($id)->update($data);

        return back()->withsuccess('data successfully update');
          
    
     
    } 


    public function deleted($id){
        $data= Blog::find($id)->delete();

        return redirect((url('blogview')))->withsuccess('blog deleted successfully');
        
    }

      public function changesesStatus(Request $request)
    {
      
        $blog =Blog::find($request->user_id);
      
        $blog->status = $request->status;
        $blog->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }


    // comment blog use foreign key 

    public function comment(){
      $post = Blog::find(3);
 
$comment = new Comment;
$comment->comment = "Hibtfht";
$comment->name = "fhdjfgrt";
 
$post = $post->comments()->save($comment);
dd($post);

// retrive 
 
// $comments = $post->comments;
 
// dd($comments);
    }

}
