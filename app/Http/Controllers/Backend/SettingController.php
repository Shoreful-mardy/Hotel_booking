<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SmtpSetting;
use App\Models\SiteSetting;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SettingController extends Controller
{
    public function SmtpSetting(){
        $smtp = SmtpSetting::find(1);
        return view('backend.setting.smtp_update',compact('smtp'));
    }//End Method


    public function SmtpUpdate(Request $request){

        SmtpSetting::findOrFail($request->id)->update([
            'mailer' => $request->mailer,
            'host' => $request->host,
            'port' => $request->port,
            'username' => $request->username,
            'password' => $request->password,
            'encryption' => $request->encryption,
            'from_address' => $request->from_address,

        ]);
        $notificaton = array(
            'message' => 'SMTP Setting Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notificaton);

    }//End Method


    // ===========Site Setting Method Start From Here

    public function SiteSetting(){
        $site = SiteSetting::find(1);
        return view('backend.setting.site_update',compact('site'));
    }//End Method

    public function UpdateSiteSetting(Request $request){

        if ($request->file('logo')) {

            $oldimage = public_path($request->oldimg);
            if (file_exists($oldimage)) {
                unlink($oldimage);//Delete Old Image
            }
            

            $request_img = $request->file('logo');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request_img->getClientOriginalExtension();
            $img = $manager->read($request_img);
            $img = $img->resize(110,44);

            $img->toJpeg(80)->save(base_path('public/upload/logo/'.$name_gen));
            $save_url = 'upload/logo/'.$name_gen;

            SiteSetting::findOrFail($request->id)->update([
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'copyright' => $request->copyright,
            'logo' => $save_url,

            ]);
            $notificaton = array(
                'message' => 'Site Setting Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notificaton);
        }else{



        SiteSetting::findOrFail($request->id)->update([
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'copyright' => $request->copyright,

        ]);
        $notificaton = array(
            'message' => 'Site Setting Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notificaton);
        }

    }//End Method



















}
