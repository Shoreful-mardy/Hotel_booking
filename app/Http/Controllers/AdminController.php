<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Team;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    }//End Method

    public function AdminLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function AdminLogin(){
        return view('admin.admin_login');
    }//End Method


    public function AdminProfile(){

        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view',compact('profileData'));
    }//End Method

    public function AdminProfileStore(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);

        


        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($request->file('photo')){


            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        };

        $data->save();

        $notificaton = array(
            'message' => 'Admin Profile Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notificaton);

    }//End Method


    public function AdminChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password',compact('profileData'));
    }//End Method

    public function AdminChangeUpdate(Request $request){

        //validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->old_password,auth::user()->password)) {
            $notificaton = array(
                'message' => 'Old Password Does Not Match',
                'alert-type' => 'error'
            );
            return back()->with($notificaton);
        }

        //Update the new Password

        User::whereId(auth::user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        $notificaton = array(
            'message' => 'Password Changed Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notificaton);


    }//End Method


    //// Admin Manage All Route Start From Here

    public function AllAdmin(){
        $alladmin = User::where('role','admin')->get();
        return view('backend.admin.all_admin',compact('alladmin'));
    }//End Method

    public function AddAdmin(){
        $role = Role::all();
        return view('backend.admin.add_admin',compact('role'));
    }//End Method

    public function StoreAdmin(Request $request){

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }
        $notificaton = array(
            'message' => 'Admin Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.admin')->with($notificaton);

    }//End Method

    public function EditAdmin($id){

        $user = User::find($id);
        $roles = Role::all();
        return view('backend.admin.edit_admin',compact('user','roles'));

    }//End Method

    public function UpdateAdmin(Request $request,$id){

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();

        $user->roles()->detach();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }
        $notificaton = array(
            'message' => 'Admin Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.admin')->with($notificaton);
    }//End Method


    public function DeleteAdmin($id){
        $user = User::find($id);

        if (!is_null($user)) {
            $user->delete();
        }
        $notificaton = array(
            'message' => 'Admin Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notificaton);
    }//End Method


































}
