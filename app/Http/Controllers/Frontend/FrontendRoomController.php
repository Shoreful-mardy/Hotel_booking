<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;
use App\Models\RoomType;
use App\Models\Room;

class FrontendRoomController extends Controller
{
    public function AllFrontendRooms(){
        $rooms = Room::latest()->get();
        return view('frontend.room.all_rooms',compact('rooms'));
    }//End Method

















}
