<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    /**
     * 
     * moduel to show all the banners
     */

    public function index(Request $request)
    {
        $banners = Banner::all();
        return view('backend.banners.index', compact('banners'));
    }

    /**module to show create new form 
     * 
     * 
     */
    public function create()
    {
        return view('backend.banners.add');
    }

    /**module to save data of banner
     * 
     */
    public function saveBanner(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'     => 'required|string|max:255',
            'file'     => 'required|image|mimes:jpg,jpeg,png'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input());
        }

        $md5Name = md5_file($request->file('file')->getRealPath());
        $guessExtension = $request->file('file')->guessExtension();
        $folder = '/uploads/banner/';
        $filename = $md5Name . '.' . $guessExtension;
        try {
            $request->file('file')->move(public_path() . $folder, $filename);
        } catch (Exception $e) {
            return back()->withErrors([['Image is failed to upload.']])->withInput($request->input());
        }


        $file_url = $folder . $filename;

        //save banner
        $banner = new Banner;
        $banner->title = $request->title;
        $banner->description = $request->description ?? '';
        $banner->link = $request->link ?? '';
        $banner->image_url = $file_url;
        $banner->status = $request->status ?? 0;

        if ($banner->save()) {
            Session::flash('success', 'Banner added successfully.');
            return redirect(route('admin.banners.all'));
        } else {
            return back()->withErrors([['Something went wrong!']])->withInput($request->input());
        }
    }

    /**
     * module to show edit form
     */
    public function edit($id)
    {
        $banner = Banner::find(_d($id));
        return view('backend.banners.edit', compact('banner'));
    }

    /**
     * module to update banner data
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'     => 'required|string|max:255',
            'file'     => 'image|mimes:jpg,jpeg,png'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input());
        }

        //save banner
        $banner = Banner::find(_d($id));

        if ($banner) {

            if ($request->hasFile('file')) {
                $md5Name = md5_file($request->file('file')->getRealPath());
                $guessExtension = $request->file('file')->guessExtension();
                $folder = '/uploads/banner/';
                $filename = $md5Name . '.' . $guessExtension;
                try {
                    $request->file('file')->move(public_path() . $folder, $filename);
                } catch (Exception $e) {
                    return back()->withErrors([['Image is failed to upload.']])->withInput($request->input());
                }

                $file_url = $folder . $filename;

                //delete old file
                if (file_exists(public_path($banner->image_url))) {
                    unlink(public_path($banner->image_url));
                }
            }

            $banner->title = $request->title;
            $banner->description = $request->description ?? '';
            $banner->link = $request->link ?? '';
            $banner->image_url = $file_url ?? $banner->image_url;
            $banner->status = $request->status ?? 0;

            if ($banner->save()) {
                Session::flash('success', 'Banner updated successfully.');
                return redirect(route('admin.banners.all'));
            } else {
                return back()->withErrors([['Something went wrong!']])->withInput($request->input());
            }
        } else {
            return back()->withErrors([['Banner not found!']])->withInput($request->input());
        }
    }

    /**
     * module to delete banner
     */
    public function destroy($id)
    {
        $banner = Banner::find(_d($id));
        if ($banner) {
            //delete old file
            if (file_exists(public_path($banner->image_url))) {
                unlink(public_path($banner->image_url));
            }

            $banner->delete();
            Session::flash('success', 'Banner deleted successfully.');
            return redirect(route('admin.banners.all'));
        } else {
            return back()->with("error", "Banner not found!");
        }
    }
}
