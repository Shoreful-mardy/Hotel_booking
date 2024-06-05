<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    
    public function AllBlogCategory(){
        $blog_category = BlogCategory::latest()->get();
        return view('backend.blog.blogcategory.all_category',compact('blog_category'));
    }//End Method

    public function StoreBlogCategory(Request $request){

        BlogCategory::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)) ,
        ]);
        $notificaton = array(
            'message' => 'Blog Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notificaton);

    }//End Method

    public function EditBlogCategory($id){
        $category = BlogCategory::find($id);
        return response()->json($category);
    }//End Method

    public function UpdateBlogCategory(Request $request){

        BlogCategory::findOrFail($request->cat_id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)) ,
        ]);
        $notificaton = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notificaton);
    }//End Method


    public function DeleteBlogCategory($id){
        BlogCategory::findOrFail($id)->delete();
        $notificaton = array(
            'message' => 'Blog Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notificaton);
    }//End Method

    // =====Blog Post All Method Start From This Line

    public function AllBlogPost(){

        $post = BlogPost::latest()->get();
        return view('backend.blog.blogpost.all_blogpost',compact('post'));

    }//End Method

    public function AddBlogPost(){
        $blog_category = BlogCategory::latest()->get();
        return view('backend.blog.blogpost.add_blogpost',compact('blog_category'));
    }//End Method

    public function StoreBlogPost(Request $request){

        if ($request->file('post_image')) {
            $request_img = $request->file('post_image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request_img->getClientOriginalExtension();
            $img = $manager->read($request_img);
            $img = $img->resize(550,370);

            $img->toJpeg(80)->save(base_path('public/upload/post_image/'.$name_gen));
            $save_url = 'upload/post_image/'.$name_gen;
        
        BlogPost::insert([

            'blogcat_id' => $request->blogcat_id,
            'user_id' => Auth::user()->id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ', '-',$request->post_title)),
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'post_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        $notificaton = array(
            'message' => 'Blog Post Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.post')->with($notificaton);
    }else{

        $notificaton = array(
            'message' => 'Blog Post Image find Is Required',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notificaton);
    }


    }//End Method

    public function EditBlogPost($id){
        $blog_category = BlogCategory::latest()->get();
        $post = BlogPost::find($id);
        return view('backend.blog.blogpost.edit_post',compact('post','blog_category'));

    }//End Method

    public function UpdateBlogPost(Request $request){

        $post_id = $request->id ;

        if ($request->file('post_image')) {

            $oldImage = public_path($request->oldimg);
            unlink($oldImage);//Delete existing Image

            $request_img = $request->file('post_image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request_img->getClientOriginalExtension();
            $img = $manager->read($request_img);
            $img = $img->resize(550,370);

            $img->toJpeg(80)->save(base_path('public/upload/post_image/'.$name_gen));
            $save_url = 'upload/post_image/'.$name_gen;
        
        BlogPost::findOrFail($post_id)->update([

            'blogcat_id' => $request->blogcat_id,
            'user_id' => Auth::user()->id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ', '-',$request->post_title)),
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'post_image' => $save_url,
        ]);
        $notificaton = array(
            'message' => 'Blog Post Updated Successfully With Image',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.post')->with($notificaton);
    }else{

        BlogPost::findOrFail($post_id)->update([

            'blogcat_id' => $request->blogcat_id,
            'user_id' => Auth::user()->id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ', '-',$request->post_title)),
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
        ]);
        $notificaton = array(
            'message' => 'Blog Post Updated Successfully Without Image',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.post')->with($notificaton);
    }

    }//End Method

    public function DeleteBlogPost($id){

        $post = BlogPost::findOrFail($id);

        $deleteImg = public_path($post->post_image);
        unlink($deleteImg);

        $post->delete();
        $notificaton = array(
            'message' => 'Blog Post Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.post')->with($notificaton);

    }//End Method

    // ======Method For Frontend Start From Here 


    public function BlogDetails($id){
        $r_post = BlogPost::latest()->limit(3)->orderBy('id','DESC')->get();
        $blog_category = BlogCategory::latest()->get();
        $post = BlogPost::findOrFail($id);
        return view('frontend.blog.blog_details',compact('post','blog_category','r_post'));

    }//End Method

    public function AllBlog(){

        $r_post = BlogPost::latest()->limit(3)->orderBy('id','DESC')->get();
        $blog_category = BlogCategory::latest()->get();
        $post = BlogPost::latest()->paginate(3);
        return view('frontend.blog.all_blog',compact('post','blog_category','r_post'));
    }///End Method



    public function CatWisePost($id){

        $r_post = BlogPost::latest()->limit(3)->orderBy('id','DESC')->get();
        $blog_category = BlogCategory::latest()->get();
        $post = BlogPost::where('blogcat_id',$id)->get();
        $bredcat = BlogCategory::where('id',$id)->first();
        return view('frontend.blog.catwise_blog',compact('post','blog_category','r_post','bredcat'));

    }//End Method






















}
