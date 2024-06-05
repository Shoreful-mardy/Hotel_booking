<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function AddComment(Request $request){
        Comment::insert([
            'user_id' => Auth::user()->id,
            'post_id' => $request->post_id,
            'message' => $request->message,
            'created_at' => Carbon::now(),

        ]);
        $notificaton = array(
            'message' => 'Comment Stored Successfully , Wait For Admin Response',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notificaton);
    }//End Method






















    
}
