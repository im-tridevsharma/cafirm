<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\ContactInfo;
use App\Models\Membership;
use App\Models\Page;
use App\Models\Payment;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\UserMembership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Razorpay\Api\Api;

class SiteController extends Controller
{
    public function index()
    {
        $page_data['title'] = 'Home';
        
        $testimonials = Testimonial::where("status", 1)->limit(3)->get();
        $blogs        = Blog::where("status", 1)->limit(3)->get();

        return view('index', compact('page_data','testimonials', 'blogs'));
    }

    public function page($slug = null)
    {
        $page = Page::where("slug", url($slug))->first();
        $page_data['title'] = $page ? $page->name : '';

        if($page){
            return view('frontend.page', compact('page','page_data'));
        }else{
            return view('frontend.404');
        }
    }

    public function blog($slug = null)
    {
        $blog = Blog::where("slug", url('blog/'.$slug))->first();
        $page_data['title'] = $blog ? $blog->title : '';

        if($blog){
            return view('frontend.blog', compact('blog','page_data'));
        }else{
            return view('frontend.404');
        }
    }

    public function blogs()
    {
        $blogs = Blog::where("status", 1)->get();
        $page_data['title'] = 'Blogs';

        return view('frontend.blogs', compact('blogs','page_data'));
    }

    //membership_checkout
    public function membership_checkout($membership, $page)
    {
        if($membership && $page)
        {
            $page_data['title'] = 'Membership Checkout';
            $page = Page::select(['id','name','slug'])->find(_d($page));
            $membership = Membership::find(_d($membership));
            
            //check is user in session
            $user  = Session::has('user') ? User::find(Session::get('user')) : false;
            $order = Session::has('recent_order') ? Payment::where("order_id", Session::get('recent_order'))->first() : false;
            
            if(!$user ||  !$order){
                Session::remove('recent_order');
                Session::remove('user');
                Session::remove('membership');
                Session::remove('page');
                Session::remove('note');
            }

            return view('frontend.membership-checkout', compact('page_data', 'page', 'membership', 'user', 'order'));
        }else{
            return redirect(route('home'));
        }

    }

    //membership_checkout_proceed
    public function membership_checkout_proceed(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'    => 'required|string|max:100',
            'last_name'     => 'required|string|max:100',
            'email'         => 'required|email',
            'mobile'        => 'required|string|between:10,12'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput($request->input());
        }

        $is_registered = User::where("email", $request->email)->count();

        if($is_registered) {
            return back()->withErrors([['Your email is already taken. Use another']])->withInput($request->input());
        }

        //save user
        $user = new User;
        $user->first_name   = $request->first_name ?? '';
        $user->last_name    = $request->last_name ?? '';
        $user->email        = $request->email ?? '';
        $user->mobile       = $request->mobile ?? '';
        $user->password     = Hash::make($request->mobile ?? '0000');
        $user->address      = $request->address ?? '';

        if($user->save())
        {
            Session::put('user', $user->id);
            //create razorpay instance
            $razorpay = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
            $membership = Membership::find(_d($request->membership));

            $option = [
                'receipt'   => base64_encode($membership->id . '_' . $request->first_name),
                'amount'    => intval($membership->discounted_price) * 100,
                'currency'  => 'INR',
                'notes'     => [
                    'membership'  => $membership->id,
                    'page'   => _d($request->page),
                    'message'   => $request->filled('note') ? $request->note : ''
                ]
            ];

            $order = $razorpay->order->create($option);
            if($order){
                $payment = new Payment;
                $payment->user_id = $user->id;
                $payment->order_id = $order->id;
                $payment->system_ref = $order->receipt ?? '';
                $payment->amount = $order->amount / 100;

                if($payment->save())
                {
                    Session::put('recent_order', $order->id);
                    Session::put('note', $request->note);
                    Session::put('membership', $membership->id);
                    Session::put('page', _d($request->page));
                }
            }

            return back();
        }
    }

    //membership_save_payment
    public function membership_save_payment(Request $request)
    {
        if($request->has('status')){
            //create membership if payment is successful
            $payment = Payment::where("order_id", $request->oid)->first();

            $user_membership = null;
            if($request->status === 'success'){
                $user_membership = new UserMembership;
                $user_membership->user_id = Session::get('user');
                $user_membership->membership_id = Session::get('membership');
                $user_membership->page_id = Session::get('page');
                $user_membership->amount_paid = $payment->amount ?? 0;
                $user_membership->note = Session::get('note');

                $user_membership->save();
            }

            //update payment
            $payment->user_membership_id = $user_membership !== null ? $user_membership->id : 0; 
            $payment->txn_id = $request->pid;
            $payment->status = $request->status;
            $payment->failed_reason = $request->reason ?? '';
            $payment->gateway_ref = $request->signature ?? '';
            $payment->gateway_used = 'RAZORPAY';

            if($payment->save()){
                Session::remove('recent_order');
                Session::remove('user');
                Session::remove('membership');
                Session::remove('page');
                Session::remove('note');

                return redirect(route('payment.status').'?s='.base64_encode($request->status));
            }else{
                return back();
            }
        }else{
            return back();
        }
    }

    //payment_status
    public function payment_status(Request $request)
    {
        $status = base64_decode($request->s);
        $page_data['title'] = $status === 'success' ? 'Payment Successful' : 'Payment Failed';
        return view('frontend.payment-status', compact('page_data', 'status'));
    }

    //about-us page
    public function aboutUs()
    {
        $page_data['title'] = 'About Us';
        return view('frontend.about-us', compact('page_data'));
    }

    //saveContact
    public function saveContact(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'name'  => 'required|string|max:100',
            'email'     => 'required|email',
            'message'   => 'required|string'
        ]);

        if($validator->fails()){
            return response([
                'status'    => false,
                'message'   => 'Please fill all the fields.',
                'error'     => $validator->errors()
            ], 422);
        }

        //create new comment
        $contact = new  ContactInfo;
        $contact->name  = $request->name ?? '';
        $contact->email     = $request->email ?? '';
        $contact->message   = $request->message ?? '';

        if($contact->save())
        {
            return response([
                'status'    => true,
                'message'   => 'Thanks for contacting Us! We will back to you soon.',   
            ], 200);
        }

        return response([
            'status'    => false,
            'message'   => 'Something went wrong!',   
        ], 500);
    }
    
}
