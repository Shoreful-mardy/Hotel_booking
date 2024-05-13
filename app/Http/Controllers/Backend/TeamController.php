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

     public function EditTeam($id){

        $team = Team::findOrFail($id);
        return view('backend.team.edit_team',compact('team'));


     }//End Method


     public function TeamUpdate(Request $request){

        $team_id = $request->id;

        if ($request->file('image')) {

            $oldImage = public_path($request->oldimg);
            unlink($oldImage);//Delete Old Image

            $request_img = $request->file('image');

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request_img->getClientOriginalExtension();
            $img = $manager->read($request_img);
            $img = $img->resize(500,670);

            $img->toJpeg(80)->save(base_path('public/upload/team/'.$name_gen));
            $save_url = 'upload/team/'.$name_gen;


            Team::findOrFail($team_id)->update([
                'name' => $request->name,
                'position' => $request->position,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
            $notificaton = array(
                'message' => 'Team Data Updated Successfully With Image',
                'alert-type' => 'success'
            );

            return redirect()->route('all.team')->with($notificaton);
        }else{
            Team::findOrFail($team_id)->update([
                'name' => $request->name,
                'position' => $request->position,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'created_at' => Carbon::now(),
            ]);
            $notificaton = array(
                'message' => 'Team Data Updated Successfully Without Image',
                'alert-type' => 'success'
            );

            return redirect()->route('all.team')->with($notificaton);
        }//End else

     }//End Method


     public function TeamDelete($id){

        $item = Team::findOrFail($id);
        $img = $item->image;
        unlink($img);

        Team::findOrFail($id)->delete();

        $notificaton = array(
                'message' => 'Team Deleted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notificaton);

     }//End Method




















}
