<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    /**
     * 
     * moduel to show all the testimonials
     */

    public function index(Request $request)
    {
        $testimonials = Testimonial::all();
        return view('backend.testimonials.index', compact('testimonials'));
    }

    /**module to show create new form 
     * 
     * 
     */
    public function create()
    {
        return view('backend.testimonials.add');
    }

    /**module to save data of testimonial
     * 
     */
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'content'  => 'required',
            'file'     => 'required|image|mimes:jpg,jpeg,png'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input());
        }

        $md5Name = md5_file($request->file('file')->getRealPath());
        $guessExtension = $request->file('file')->guessExtension();
        $folder = '/uploads/testimonial/';
        $filename = $md5Name . '.' . $guessExtension;
        try {
            $request->file('file')->move(public_path() . $folder, $filename);
        } catch (Exception $e) {
            return back()->withErrors([['Image is failed to upload.']])->withInput($request->input());
        }


        $file_url = $folder . $filename;

        //save testimonial
        $testimonial = new Testimonial;
        $testimonial->name = $request->name;
        $testimonial->content = $request->content ?? '';
        $testimonial->role = $request->role ?? '';
        $testimonial->image = $file_url;
        $testimonial->status = $request->status ?? 0;

        if ($testimonial->save()) {
            Session::flash('success', 'Testimonial added successfully.');
            return redirect(route('admin.testimonials.all'));
        } else {
            return back()->withErrors([['Something went wrong!']])->withInput($request->input());
        }
    }

    /**
     * module to show edit form
     */
    public function edit($id)
    {
        $testimonial = Testimonial::find(_d($id));
        return view('backend.testimonials.edit', compact('testimonial'));
    }

    /**
     * module to update testimonial data
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'content'  => 'required',
            'file'     => 'image|mimes:jpg,jpeg,png'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input());
        }

        //save testimonial
        $testimonial = Testimonial::find(_d($id));

        if ($testimonial) {

            if ($request->hasFile('file')) {
                $md5Name = md5_file($request->file('file')->getRealPath());
                $guessExtension = $request->file('file')->guessExtension();
                $folder = '/uploads/testimonial/';
                $filename = $md5Name . '.' . $guessExtension;
                try {
                    $request->file('file')->move(public_path() . $folder, $filename);
                } catch (Exception $e) {
                    return back()->withErrors([['Image is failed to upload.']])->withInput($request->input());
                }

                $file_url = $folder . $filename;

                //delete old file
                if (file_exists(public_path($testimonial->image_url))) {
                    unlink(public_path($testimonial->image_url));
                }
            }

            $testimonial->name = $request->name;
            $testimonial->content = $request->content ?? '';
            $testimonial->role = $request->role ?? '';
            $testimonial->image = $file_url ?? $testimonial->image;
            $testimonial->status = $request->status ?? 0;

            if ($testimonial->save()) {
                Session::flash('success', 'Testimonial updated successfully.');
                return redirect(route('admin.testimonials.all'));
            } else {
                return back()->withErrors([['Something went wrong!']])->withInput($request->input());
            }
        } else {
            return back()->withErrors([['Testimonial not found!']])->withInput($request->input());
        }
    }

    /**
     * module to delete testimonial
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find(_d($id));
        if ($testimonial) {
            //delete old file
            if (file_exists(public_path($testimonial->image))) {
                unlink(public_path($testimonial->image));
            }

            $testimonial->delete();
            Session::flash('success', 'Testimonial deleted successfully.');
            return redirect(route('admin.testimonials.all'));
        } else {
            return back()->with("error", "Testimonial not found!");
        }
    }
}
