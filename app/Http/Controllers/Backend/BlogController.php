<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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




















}
