<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;

class RoomController extends Controller
{
    public function EditRoom($id){

        $edit_data = Room::find($id);
        return view('backend.room.rooms.edit_room',compact('edit_data'));
    }//End Method





















}
