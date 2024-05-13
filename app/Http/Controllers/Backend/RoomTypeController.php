<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;
use App\Models\RoomType;
use App\Models\Room;

class RoomTypeController extends Controller
{
    public function RoomTypeList(){
        $allData = RoomType::orderBy('id','DESC')->get();
        return view('backend.room.roomtype.view_roomtype',compact('allData'));
    }//End Method


    public function AddRoomType(){
        return view('backend.room.roomtype.add_roomtype');
    }//End Method


    public function StoreRoomType(Request $request){

        $room_type_id = RoomType::insertGetId([
            'name'=> $request->name,
            'created_at'=> Carbon::now(),
        ]);

        Room::insert([
            'roomtype_id' => $room_type_id,
        ]);

        $notificaton = array(
                'message' => 'Room Type Inserted Successfully',
                'alert-type' => 'success'
        );

        return redirect()->route('room.type')->with($notificaton);
    }//End Mehthod


 




















}
