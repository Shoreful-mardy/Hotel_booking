<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\SiteSetting;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function ContactUs(){
        $site_info = SiteSetting::find(1);
        return view('frontend.contact.contact_us',compact('site_info'));
    }//End Method



    public function ContactStore(Request $request){

        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),

        ]);

        $notificaton = array(
            'message' => 'Your Message Send Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notificaton);
    }//End Method

    // =========Admin Method Start from here

    public function ContactMessage(){
        $contact = Contact::latest()->get();
        return view('backend.contact.contact_message',compact('contact'));
    }// End Method


    public function ViewMessage($id){
         $contact = Contact::find($id);
         return response()->json($contact);
    }//End Method










}
