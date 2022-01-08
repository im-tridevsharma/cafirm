<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['login', 'authenticateAdmin']]);
    }
    /**
     * 
     * method to render login screen for admin
     */

    public function login()
    {
        if (Auth::guard('admin')->user()) {
            return redirect(route('admin.dashboard'));
        }

        return view('backend.login');
    }

    /**
     * method to process login
     */

    public function authenticateAdmin(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'email_or_username' =>  'required|string|max:100',
            'password'          =>  'required'
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input());
        }

        //process authentication
        if (filter_var($request->email_or_username, FILTER_VALIDATE_EMAIL)) {
            if (Auth::guard('admin')->attempt(['email' => $request->email_or_username, 'password' => $request->password])) {
                $admin = Admin::find(Auth::guard('admin')->user()->id);
                $admin->is_loggedin = 1;
                $admin->save();
                return redirect(route('admin.dashboard'));
            } else {
                return back()->withErrors([['Email or Password is wrong. Please check!']])->withInput($request->input());;
            }
        } else {
            if (Auth::guard('admin')->attempt(['username' => $request->email_or_username, 'password' => $request->password])) {
                $admin = Admin::find(Auth::guard('admin')->user()->id);
                $admin->is_loggedin = 1;
                $admin->save();
                return redirect(route('admin.dashboard'));
            } else {
                return back()->withErrors([['Username or Password is wrong. Please check!']])->withInput($request->input());;
            }
        }
    }

    /**
     * method to logout user
     */

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }
}
