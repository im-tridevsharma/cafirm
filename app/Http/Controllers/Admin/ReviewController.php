<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
     /**
     * 
     * moduel to show all the reviews
     */

    public function index(Request $request)
    {
        $reviews = Review::all();
        return view('backend.reviews.index', compact('reviews'));
    }

    /**module to show create new form 
     * 
     * 
     */
    public function create()
    {
        return view('backend.reviews.add');
    }

    /**module to save data of review
     * 
     */
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname'     => 'required|string|max:255',
            'status'       => 'required',
            'rating'       => 'required',
            'content'      => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input());
        }

        //save review
        $review = new Review;
        $review->fullname = $request->fullname;
        $review->rating = $request->rating??0;
        $review->content = $request->content??'';
        $review->status = $request->status ?? 0;

        if ($review->save()) {
            Session::flash('success', 'Review added successfully.');
            return redirect(route('admin.reviews.all'));
        } else {
            return back()->withErrors([['Something went wrong!']])->withInput($request->input());
        }
    }

    /**
     * module to show edit form
     */
    public function edit($id)
    {
        $review = Review::find(_d($id));
        return view('backend.reviews.edit', compact('review'));
    }

    /**
     * module to update review data
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'fullname'     => 'required|string|max:255',
            'rating'       => 'required',
            'status'       => 'required',
            'content'      => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input());
        }

        //save review
        $review = Review::find(_d($id));

        if ($review) {

            $review->fullname = $request->fullname;
            $review->rating = $request->rating??0;
            $review->content = $request->content??'';
            $review->status = $request->status ?? 0;

            if ($review->save()) {
                Session::flash('success', 'Review updated successfully.');
                return redirect(route('admin.reviews.all'));
            } else {
                return back()->withErrors([['Something went wrong!']])->withInput($request->input());
            }
        } else {
            return back()->withErrors([['Review not found!']])->withInput($request->input());
        }
    }

    /**
     * module to delete review
     */
    public function destroy($id)
    {
        $review = Review::find(_d($id));
        if ($review) {
            $review->delete();
            Session::flash('success', 'Review deleted successfully.');
            return redirect(route('admin.reviews.all'));
        } else {
            return back()->with("error", "Review not found!");
        }
    }
}
