<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessCategory;
use App\Models\Category;
use App\Models\Page;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    /**
     * 
     * moduel to show all the pages
     */

    public function index(Request $request)
    {
        $pages = Page::all();
        return view('backend.pages.index', compact('pages'));
    }

    /**module to show create new form 
     * 
     * 
     */
    public function create()
    {
        $categories = Category::where("status", 1)->get();
        $b_categories = BusinessCategory::where("status", 1)->get();
        return view('backend.pages.add', compact('categories', 'b_categories'));
    }

    /**module to save data of page
     * 
     */
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'status'     => 'required',
            'membership_category' => 'required',
            'slug'  => 'required',
            'content'   => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input());
        }

        if (Page::where("slug", $request->slug)->count()) {
            return back()->withErrors([['Slug is already exists in the system. Chage the title.']])->withInput($request->input());
        }

        if($request->has('cover')){
            $md5Name = md5_file($request->file('cover')->getRealPath());
            $guessExtension = $request->file('cover')->guessExtension();
            $folder = '/uploads/pages/';
            $filename = $md5Name . '.' . $guessExtension;
            try {
                $request->file('cover')->move(public_path() . $folder, $filename);
            } catch (Exception $e) {
                return back()->withErrors([['Cover Image is failed to upload.']])->withInput($request->input());
            }
    
            $file_url = $folder . $filename;
        }

        //save page
        $page = new Page;
        $page->name = $request->name;
        $page->subtitle = $request->subtitle ?? '';
        $page->slug = $request->slug ?? url('/');
        $page->membership_category = $request->membership_category ? _d($request->membership_category) : 0;
        $page->business_category = $request->business_category ? _d($request->business_category) : 0;
        $page->content = $request->content ?? '';
        $page->description1 = $request->description1 ?? '';
        $page->description2 = $request->description2 ?? '';
        $page->is_contact_form = $request->is_contact_form ?? 0;
        $page->status = $request->status ?? 0;
        $page->content_order = $request->content_order ?? 0;
        $page->membership_order = $request->membership_order ?? 1;
        $page->description1_order = $request->description1_order ?? 2;
        $page->description2_order = $request->description2_order ?? 3;
        $page->contact_form_order = $request->contact_form_order ?? 4;
        $page->cover = $file_url ?? '';

        if ($page->save()) {
            Session::flash('success', 'Page added successfully.');
            return redirect(route('admin.pages.all'));
        } else {
            return back()->withErrors([['Something went wrong!']])->withInput($request->input());
        }
    }

    /**
     * module to show edit form
     */
    public function edit($id)
    {
        $page = Page::find(_d($id));
        $categories = Category::where('status', 1)->get();
        $b_categories = BusinessCategory::where("status", 1)->get();
        return view('backend.pages.edit', compact('page', 'categories','b_categories'));
    }

    /**
     * module to update page data
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'status'     => 'required',
            'membership_category' => 'required',
            'slug'  => 'required',
            'content'   => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input());
        }

        if (Page::where("slug", $request->slug)->count() > 1) {
            return back()->withErrors([['Slug is already exists in the system. Chage the title.']]);
        }

        //save page
        $page = Page::find(_d($id));
        if ($page) {

            if ($request->hasFile('cover')) {
                $md5Name = md5_file($request->file('cover')->getRealPath());
                $guessExtension = $request->file('cover')->guessExtension();
                $folder = '/uploads/pages/';
                $filename = $md5Name . '.' . $guessExtension;
                try {
                    $request->file('cover')->move(public_path() . $folder, $filename);
                } catch (Exception $e) {
                    return back()->withErrors([['Cover Image is failed to upload.']])->withInput($request->input());
                }

                $file_url = $folder . $filename;

                //delete old file
                if (file_exists(public_path($page->cover)) && $page->cover) {
                    unlink(public_path($page->cover));
                }
            }

            $page->name = $request->name;
            $page->subtitle = $request->subtitle ?? '';
            $page->slug = $request->slug ?? url('/');
            $page->membership_category = $request->membership_category ? _d($request->membership_category) : 0;
            $page->business_category = $request->business_category ? _d($request->business_category) : 0;
            $page->content = $request->content ?? '';
            $page->description1 = $request->description1 ?? '';
            $page->description2 = $request->description2 ?? '';
            $page->is_contact_form = $request->is_contact_form ?? 0;
            $page->status = $request->status ?? 0;
            $page->content_order = $request->content_order ?? 0;
            $page->membership_order = $request->membership_order ?? 1;
            $page->description1_order = $request->description1_order ?? 2;
            $page->description2_order = $request->description2_order ?? 3;
            $page->contact_form_order = $request->contact_form_order ?? 4;
            $page->cover = $file_url ?? $page->cover;

            if ($page->save()) {
                Session::flash('success', 'Page updated successfully.');
                return redirect(route('admin.pages.all'));
            } else {
                return back()->withErrors([['Something went wrong!']])->withInput($request->input());
            }
        }
    }

    /**
     * module to delete page
     */
    public function destroy($id)
    {
        $page = Page::find(_d($id));
        if ($page) {
            $page->delete();
            Session::flash('success', 'Page deleted successfully.');
            return redirect(route('admin.pages.all'));
        } else {
            return back()->with("error", "Page not found!");
        }
    }
}
