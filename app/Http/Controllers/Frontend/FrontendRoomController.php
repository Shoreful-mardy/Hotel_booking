<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;
use App\Models\RoomType;
use App\Models\Room;
use App\Models\Facility;
use App\Models\MultiImage;

class FrontendRoomController extends Controller
{
    public function AllFrontendRooms(){
        $rooms = Room::latest()->get();
        return view('frontend.room.all_rooms',compact('rooms'));
    }//End Method


    public function RoomDetailsPage($id){
        $roomdetails = Room::find($id);
        $multiImage = MultiImage::where('room_id',$id)->get();
        $facility = Facility::where('room_id',$id)->get();
        return view('frontend.room.room_details_page',compact('roomdetails','multiImage','facility'));
    }//End Method

















}
