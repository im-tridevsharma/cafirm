<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MembershipController extends Controller
{
    /**
     * 
     * moduel to show all the memberships
     */

    public function index(Request $request)
    {
        $memberships = Membership::all();
        return view('backend.memberships.index', compact('memberships'));
    }

    /**module to show create new form 
     * 
     * 
     */
    public function create()
    {
        $categories = Category::where("status", 1)->get();
        return view('backend.memberships.add', compact('categories'));
    }

    /**module to save data of membership
     * 
     */
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'     => 'required|string|max:255',
            'category_id' => 'required',
            'status'     => 'required',
            'validity'  => 'required',
            'basic_price' => 'required',
            'discount_rate' => 'required',
            'discounted_price' => 'required',
            'features'      => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input());
        }

        //save membership
        $membership = new Membership;
        $membership->title = $request->title;
        $membership->category_id = $request->category_id ? _d($request->category_id) : 0;
        $membership->description = $request->description ?? '';
        $membership->validity = date("Y-m-d", strtotime($request->validity));
        $membership->basic_price = $request->basic_price ?? 0;
        $membership->discount_rate = $request->discount_rate ?? 0;
        $membership->discounted_price = $request->discounted_price ?? 0;
        $membership->features = $request->features ? json_encode($request->features) : [];
        $membership->status = $request->status ?? 0;

        if ($membership->save()) {
            Session::flash('success', 'Membership added successfully.');
            return redirect(route('admin.memberships.all'));
        } else {
            return back()->withErrors([['Something went wrong!']])->withInput($request->input());
        }
    }

    /**
     * module to show edit form
     */
    public function edit($id)
    {

        $categories = Category::where("status", 1)->get();
        $membership = Membership::find(_d($id));
        return view('backend.memberships.edit', compact('membership', 'categories'));
    }

    /**
     * module to update membership data
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'     => 'required|string|max:255',
            'category_id' => 'required',
            'status'     => 'required',
            'validity'  => 'required',
            'basic_price' => 'required',
            'discount_rate' => 'required',
            'discounted_price' => 'required',
            'features'      => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input());
        }

        //save membership
        $membership = Membership::find(_d($id));
        if ($membership) {
            $membership->title = $request->title;
            $membership->category_id = $request->category_id ? _d($request->category_id) : 0;
            $membership->description = $request->description ?? '';
            $membership->validity = date("Y-m-d", strtotime($request->validity));
            $membership->basic_price = $request->basic_price ?? 0;
            $membership->discount_rate = $request->discount_rate ?? 0;
            $membership->discounted_price = $request->discounted_price ?? 0;
            $membership->features = $request->features ? json_encode($request->features) : [];
            $membership->status = $request->status ?? 0;

            if ($membership->save()) {
                Session::flash('success', 'Membership updated successfully.');
                return redirect(route('admin.memberships.all'));
            } else {
                return back()->withErrors([['Something went wrong!']])->withInput($request->input());
            }
        }
    }

    /**
     * module to delete membership
     */
    public function destroy($id)
    {
        $membership = Membership::find(_d($id));
        if ($membership) {
            $membership->delete();
            Session::flash('success', 'Membership deleted successfully.');
            return redirect(route('admin.memberships.all'));
        } else {
            return back()->with("error", "Membership not found!");
        }
    }
}
