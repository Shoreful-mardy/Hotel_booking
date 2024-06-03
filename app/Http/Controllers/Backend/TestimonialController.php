<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;

class TestimonialController extends Controller
{
    public function AllTestimonial(){

        $testimonial = Testimonial::latest()->get();
        return view('backend.testimonial.all_testimonial',compact('testimonial'));

    }// End Method

    public function AddTestimonial(){
        return view('backend.testimonial.add_testimonial');
    }//End Method

    public function StoreTestimonial(Request $request){

        if ($request->file('image')) {
            $request_img = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request_img->getClientOriginalExtension();
            $img = $manager->read($request_img);
            $img = $img->resize(50,50);

            $img->toJpeg(80)->save(base_path('public/upload/testimonial/'.$name_gen));
            $save_url = 'upload/testimonial/'.$name_gen;
        }


        Testimonial::insert([
            'name' => $request->name,
            'city' => $request->city,
            'message' => $request->message,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        $notificaton = array(
            'message' => 'Testimonial Data Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.testimonial')->with($notificaton);

    }//End Method

    public function EditTestimonial($id){
        $tdata = Testimonial::findOrFail($id);
        return view('backend.testimonial.edit_testimonial',compact('tdata'));
    }//End Method

    public function UpdateTestimonial(Request $request){
        $id = $request->id;
            

        if ($request->file('image')) {

            $oldImage = public_path($request->oldimg);
            unlink($oldImage);//Delete Old Image

            $request_img = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request_img->getClientOriginalExtension();
            $img = $manager->read($request_img);
            $img = $img->resize(50,50);

            $img->toJpeg(80)->save(base_path('public/upload/testimonial/'.$name_gen));
            $save_url = 'upload/testimonial/'.$name_gen;

            Testimonial::findOrFail($id)->update([
            'name' => $request->name,
            'city' => $request->city,
            'message' => $request->message,
            'image' => $save_url,
            ]);
            $notificaton = array(
                'message' => 'Testimonial Data Updated Successfully With Image',
                'alert-type' => 'success'
            );

            return redirect()->route('all.testimonial')->with($notificaton);
        }else{
            Testimonial::findOrFail($id)->update([
                'name' => $request->name,
                'city' => $request->city,
                'message' => $request->message,
            ]);
            $notificaton = array(
                'message' => 'Testimonial Data Updated Successfully Without Image',
                'alert-type' => 'success'
            );

            return redirect()->route('all.testimonial')->with($notificaton);
        }
    }//End Method

    public function DeleteTestimonial($id){

        $img = Testimonial::find($id);
        $deleteImg = $img->image;
        unlink($deleteImg);

        Testimonial::findOrFail($id)->delete();
        $notificaton = array(
            'message' => 'Testimonial Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.testimonial')->with($notificaton);

    }//End Method
























}
