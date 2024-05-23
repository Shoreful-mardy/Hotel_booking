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
use App\Models\RoomType;
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
        $allroomNo = RoomNumber::where('room_id', $id)->get();
        return view('backend.room.rooms.edit_room',compact('edit_data','basic_facility','multiimage','allroomNo'));
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
        $room->status = 1;


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


    public function StoreRoomNo(Request $request,$id){

         RoomNumber::insert([
            'room_id' => $id,
            'room_type_id' => $request->room_type_id,
            'room_type_no' => $request->room_type_no,
            'status' => $request->status,
         ]);

         $notificaton = array(
                'message' => 'Room Number Added Successfully',
                'alert-type' => 'success'
        );

        return redirect()->back()->with($notificaton);


    }//End Method


    public function EditRoomNo($id){

        $edit_room = RoomNumber::find($id);

        return view('backend.room.rooms.edit_room_no',compact('edit_room'));

    }//End Method


    public function UpdateRoomNo(Request $request,$id){
        RoomNumber::findOrFail($id)->update([
            'room_type_no' => $request->room_type_no,
            'status' => $request->status,
         ]);

         $notificaton = array(
                'message' => 'Room Number Update Successfully',
                'alert-type' => 'success'
        );

        return redirect()->route('room.type')->with($notificaton);
    }//End Method


    public function DeleteRoomNo($id){

        RoomNumber::findOrFail($id)->delete();

        $notificaton = array(
                'message' => 'Room Number Deleted Successfully',
                'alert-type' => 'success'
        );

        return redirect()->back()->with($notificaton);

    }//End Method



    public function DeleteRoom(Request $request,$id){

        $room = Room::find($id);

        if (file_exists('upload/rooming/'.$room->image) AND ! empty($room->image) ) {
            @unlink('upload/rooming/'.$room->image);
        }


        $subimage = MultiImage::where('room_id',$room->id)->get()->toArray();
        if (!empty($subimage)) {
            foreach($subimage as $value){
                if (!empty($value)) {
                    @unlink('upload/rooming/multi_img/'.$value['multi_img']);
                }
            }
        }

        RoomType::where('id',$room->roomtype_id)->delete();
        MultiImage::where('room_id',$room->id)->delete();
        Facility::where('room_id',$room->id)->delete();
        RoomNumber::where('room_id',$room->id)->delete();
        $room->delete();

        $notificaton = array(
                'message' => 'Room  Deleted Successfully',
                'alert-type' => 'success'
        );

        return redirect()->back()->with($notificaton);






    }//End Method




















}
