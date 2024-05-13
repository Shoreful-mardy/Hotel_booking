<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon;

class TeamController extends Controller
{
    public function AllTeam(){
        $team = Team::latest()->get();
        return view('backend.team.all_team',compact('team'));
    }//End Method


    public function AddTeam(){
        return view('backend.team.add_team');
    }//End Method


    public function TeamStore(Request $request){


        if ($request->file('image')) {
            $request_img = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request_img->getClientOriginalExtension();
            $img = $manager->read($request_img);
            $img = $img->resize(500,670);

            $img->toJpeg(80)->save(base_path('public/upload/team/'.$name_gen));
            $save_url = 'upload/team/'.$name_gen;
        }


        Team::insert([
            'name' => $request->name,
            'position' => $request->position,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        $notificaton = array(
            'message' => 'Team Data Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.team')->with($notificaton);
     }//End Method




















}
