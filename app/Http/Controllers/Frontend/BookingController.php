<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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

class BookingController extends Controller
{
    public function CheckOut(){

        if (Session::has('book_date')) {
            $book_data = Session::get('book_date');
            $room = Room::find($book_data['room_id']);

            $toDate = Carbon::parse($book_data['check_in']);
            $fromDate = Carbon::parse($book_data['check_out']);

            $nights = $toDate->diffInDays($fromDate);
            return view('frontend.checkout.checkout',compact('book_data','room','nights'));
        }else{

            $notificaton = array(
                'message' => 'Something Want To Wrong',
                'alert-type' => 'error'
            );
            return redirect('/')->with($notificaton);
        }

        
    }//End Method

    public function UserBookingStore(Request $request){
        $validateData = $request->validate([
            'check_in' => 'required',
            'check_out' => 'required',
            'person' => 'required',
            'number_of_rooms' => 'required',
        ]);

        if ($request->available_room < $request->number_of_rooms) {
            $notificaton = array(
                'message' => 'Something Want To Wrong',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notificaton);
        }

        Session::forget('book_date');

        $data = array();
        $data['number_of_rooms'] = $request->number_of_rooms;
        $data['available_room'] = $request->available_room;
        $data['person'] = $request->person;
        $data['check_in'] = date('Y-m-d',strtotime($request->check_in));
        $data['check_out'] = date('Y-m-d',strtotime($request->check_out));
        $data['room_id'] = $request->room_id;

        Session::put('book_date',$data);

        return redirect()->route('checkout');


    }//End Method


    public function CheckOutStore(Request $request){

        $this->validate( $request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'address' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'payment_method' => 'required',
        ])

    }//End Method





















}
