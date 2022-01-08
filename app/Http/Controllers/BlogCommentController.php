<?php

namespace App\Http\Controllers;

use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogCommentController extends Controller
{
    /**
     * module to add new comment
     * 
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'fullname'  => 'required|string|max:100',
            'email'     => 'required|email',
            'comment'   => 'required|string'
        ]);

        if($validator->fails()){
            return response([
                'status'    => false,
                'message'   => 'Please fill all the fields.',
                'error'     => $validator->errors()
            ], 422);
        }

        //create new comment
        $commnet = new  BlogComment;
        $commnet->blog_id   = _d($request->blog_id);
        $commnet->fullname  = $request->fullname ?? '';
        $commnet->email     = $request->email ?? '';
        $commnet->comment   = $request->comment ?? '';
        $commnet->status    = 0;

        if($commnet->save())
        {
            return response([
                'status'    => true,
                'message'   => 'Your comment added successfully. It will appear once get approved.',   
            ], 200);
        }

        return response([
            'status'    => false,
            'message'   => 'Something went wrong!',   
        ], 500);
    }
}
