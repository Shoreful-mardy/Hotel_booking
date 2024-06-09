<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use Maatwebsite\Excel\Facades\Excel;

class RoleController extends Controller
{
    public function AllPermission(){

        $permission = Permission::latest()->get();
        return view('backend.pages.permission.all_permission',compact('permission'));

    }//End Method


    public function AddPermission(){
        return view('backend.pages.permission.add_permission');
    }//End Method

    public function StorePermission(Request $request){
        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
        $notificaton = array(
                'message' => 'Permission Created Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.permission')->with($notificaton);
    }//End Method

    public function EditPermission($id){

        $permission = Permission::find($id);
        return view('backend.pages.permission.edit_permission',compact('permission'));

    }//End Method



    public function UpdatePermission(Request $request){

        $per_id = $request->id;

        Permission::find($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
        $notificaton = array(
                'message' => 'Permission Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.permission')->with($notificaton);
    }//End Method

    public function DeletePermission($id){
        Permission::find($id)->delete();
        $notificaton = array(
                'message' => 'Permission Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.permission')->with($notificaton);
    }//End Method


    public function ImportPermission(){
        return view('backend.pages.permission.import_permission');
    }//End Method


    public function ExportPermission(){

        return Excel::download(new PermissionExport, 'permission.xlsx');

    }//End Method


    public function Import(Request $request){

        Excel::import(new PermissionImport, $request->file('import_file'));
        
        $notificaton = array(
                'message' => 'Permission Imported Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.permission')->with($notificaton);
    }//End Method

    ////=========Role All method Start From Here

    public function AllRoles(){
        $role = Role::latest()->get();
        return view('backend.pages.roles.all_role',compact('role'));
    }//End Method

    public function AddRoles(){
        return view('backend.pages.roles.add_role');
    }//End Method


    public function StoreRoles(Request $request){
        Role::create([
            'name' => $request->name,
        ]);
        $notificaton = array(
                'message' => 'Role Created Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.role')->with($notificaton);
    }//End Method


    public function EditRole($id){
        $roles = Role::find($id);
        return view('backend.pages.roles.edit_roles',compact('roles'));
    }//End Method 

    public function UpdateRole(Request $request){

        $role_id = $request->id;

        Role::find($role_id)->update([
            'name' => $request->name,
        ]);
        $notificaton = array(
                'message' => 'Role Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.role')->with($notificaton);
    }//End Method 

    public function DeleteRole($id){
        Role::find($id)->delete();

        $notificaton = array(
                'message' => 'Role Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.role')->with($notificaton);
    }//End Method



























}
