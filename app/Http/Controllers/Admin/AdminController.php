<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use App\Models\Payment;
use App\Models\User;
use App\Models\UserMembership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * 
     * method to display admin dashboard
     * 
     */

    public function dashboard()
    {
        return view('backend.dashboard');
    }

    //membership_bookings
    public function membership_bookings(Request $request)
    {
        $bookings = UserMembership::all()->map(function ($b){
            $user = User::find($b->user_id);
            $membership = Membership::find($b->membership_id);

            $b->first_name = $user->first_name .' '. $user->last_name;
            $b->email = $user->email;
            $b->mobile = $user->mobile;
            $b->plan = $membership->title;

            return $b;
        });
        return view('backend.bookings.index', compact('bookings'));
    }

    //membership_bookings_delete
    public function membership_bookings_delete($id)
    {
        $booking = UserMembership::find(_d($id));
        if($booking){
            Payment::where("user_membership_id", $booking->id)->delete();
            $booking->delete();

            Session::flash('success', 'Booking and related information to it deleted successfully.');
            return back();
        }else{
            Session::flash('error', "Booking not found!");
            return back();
        }
    }

    //membership_bookings_view
    public function membership_bookings_view($id)
    {
        $booking = UserMembership::find(_d($id))->load(['user','membership']);
        return view('backend.bookings.view', compact('booking'));
    }
}
