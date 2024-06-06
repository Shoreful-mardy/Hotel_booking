<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;

class GalleryController extends Controller
{
    public function AllGallery(){
        $gallery = Gallery::latest()->get();
        return view('backend.gallery.all_gallery',compact('gallery'));
    }//End Method

    public function AddGallery(){
        return view('backend.gallery.add_gallery');
    }//End Method


    public function StoreGallery(Request $request){

        $images = $request->file('photo_name');
        foreach($images as $img){

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            $img = $manager->read($img);
            $img = $img->resize(550,550);

            $img->toJpeg(80)->save(base_path('public/upload/gallery/'.$name_gen));
            $save_url = 'upload/gallery/'.$name_gen;

            Gallery::insert([
                'photo_name' => $save_url,
                'created_at' => Carbon::now(),
            ]);
        }//End foreach

        $notificaton = array(
            'message' => 'Gallery Photo Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.gallery')->with($notificaton);

    }//End Method


    public function DeleteGalleryMultiple(Request $request){
        $selecteditems = $request->input('selectItem',[]);

        foreach($selecteditems as $itemId){
            $item = Gallery::find($itemId);
            $img = $item->photo_name;
            unlink($img);
            $item->delete();
        }//
        $notificaton = array(
            'message' => 'Selected Image Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.gallery')->with($notificaton);
    }//End Method


    public function DeleteGalleryImage($id){

        $item = Gallery::find($id);
        $img = $item->photo_name;
        unlink($img);
        $item->delete();
        $notificaton = array(
            'message' => 'Image Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notificaton);

    }
















}
