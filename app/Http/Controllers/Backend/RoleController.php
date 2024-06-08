<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Exports\PermissionExport;
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



























}
