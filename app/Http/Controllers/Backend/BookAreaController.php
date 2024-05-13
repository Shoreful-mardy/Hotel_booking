<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;
use App\Models\BookArea;

class BookAreaController extends Controller
{
    public function BookArea(){
        $bookarea = BookArea::find(1);
        return view('backend.bookarea.book_area',compact('bookarea'));
    }//End Method


    public function UpdateBookArea(Request $request){

        $book_id = $request->id;

        if ($request->file('image')) {

            $oldImage = public_path($request->oldimg);
            unlink($oldImage);//Delete Old Image

            $request_img = $request->file('image');

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request_img->getClientOriginalExtension();
            $img = $manager->read($request_img);
            $img = $img->resize(576,576);

            $img->toJpeg(80)->save(base_path('public/upload/bookarea/'.$name_gen));
            $save_url = 'upload/bookarea/'.$name_gen;


            BookArea::findOrFail($book_id)->update([
                'short_title' => $request->short_title,
                'main_title' => $request->main_title,
                'short_desc' => $request->short_desc,
                'link_url' => $request->link_url,
                'image' => $save_url,
            ]);
            $notificaton = array(
                'message' => 'Book Area Updated Successfully With Image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notificaton);
        }else{
            BookArea::findOrFail($book_id)->update([
                'short_title' => $request->short_title,
                'main_title' => $request->main_title,
                'short_desc' => $request->short_desc,
                'link_url' => $request->link_url,
            ]);
            $notificaton = array(
                'message' => 'Book Area Updated Successfully Without Image',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notificaton);
        }//End else


    }//End Method















}
