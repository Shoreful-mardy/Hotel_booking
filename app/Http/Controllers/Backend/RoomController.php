<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;
use App\Models\Facility;
use App\Models\MultiImage;
use App\Models\RoomNumber;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;

class RoomController extends Controller
{
    public function EditRoom($id){
        $basic_facility = Facility::where('room_id', $id)->get();
        $multiimage = MultiImage::where('room_id', $id)->get();
        $edit_data = Room::find($id);
        return view('backend.room.rooms.edit_room',compact('edit_data','basic_facility','multiimage'));
    }//End Method


    public function UpdateRoom(Request $request, $id){

        $room = Room::find($id);
        $room->roomtype_id = $room->roomtype_id;
        $room->total_adult = $request->total_adult;
        $room->total_child = $request->total_child;

        $room->room_capacity = $request->room_capacity;
        $room->size = $request->size;
        $room->view = $request->view;
        $room->price = $request->price;
        $room->bed_style = $request->bed_style;

        $room->discount = $request->discount;
        $room->short_desc = $request->short_desc;
        $room->long_desc = $request->long_desc;


        // Update Thambnail Image

        if ($request->file('image')) {

            $request_img = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request_img->getClientOriginalExtension();
            $img = $manager->read($request_img);
            $img = $img->resize(550,850);

            $img->toJpeg(80)->save(base_path('public/upload/rooming/'.$name_gen));
            $room['image'] = $name_gen;
        }

        $room->save();

        /// Update Facility Table Update From to this position

        if ($request->facility_name == NULL) {

            $notificaton = array(
                'message' => 'Sorry! Not Any Basic Facility Selected',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notificaton);
        }else{

            Facility::where('room_id',$id)->delete();
            $facilities = count($request->facility_name);

            for($i=0;$i < $facilities;$i++){
                $fcount = new Facility();
                $fcount->room_id = $room->id;
                $fcount->facility_name = $request->facility_name[$i];
                $fcount->save();
            }//End loop
        }//End If



        /// Update Multi Image Start From here

        if ($room->save()) {

            $files = $request->multi_img;

            if (!empty($files)) {
                $subimage = MultiImage::where('room_id',$id)->get()->toArray();
                MultiImage::where('room_id',$id)->delete();
            }

            if (!empty($files)) {
                foreach ($files as $file) {
                   $imgName = date('YmdHi').$file->getClientOriginalName();
                   $file->move('upload/rooming/multi_img',$imgName);
                   $subimage['multi_img'] = $imgName;
                   $subimage = new MultiImage();
                   $subimage->room_id = $room->id;
                   $subimage->multi_img = $imgName;
                   $subimage->save();
                }//End Foreach
            }///End if    
        }//End if





       $notificaton = array(
                'message' => 'Room Update Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notificaton);


    }//End Method


    public function MultiImageDelete($id){
       $deleteData = MultiImage::where('id',$id)->first();
        if ($deleteData) {
             $imagePath = $deleteData->multi_img;
             //Check if The File exists before unlink
             if (file_exists($imagePath)) {
                 unlink($imagePath);
                 echo "Image unlinked Successfully";
             }else{
                echo "Image Dosen't Exist";
             }

             ///Delete  the Recod From Database

             MultiImage::where('id',$id)->delete();
         } 
        $notificaton = array(
                'message' => 'MultiImage delete Successfully',
                'alert-type' => 'success'
        );

        return redirect()->back()->with($notificaton);
    }//End Method





















}
