<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * 
     * moduel to show all the menus
     */

    public function index(Request $request)
    {
        $menus = Menu::all();
        return view('backend.menus.index', compact('menus'));
    }

    /**module to show create new form 
     * 
     * 
     */
    public function create()
    {
        $pages = Page::where("status", 1)->get();
        $blogs = Blog::where("status", 1)->get();
        $menus = Menu::where("status", 1)->get();
        return view('backend.menus.add', compact('pages', 'blogs', 'menus'));
    }

    /**module to save data of menu
     * 
     */
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'     => 'required|string|max:255',
            'status'     => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input());
        }

        $last_menu = Menu::orderBy("id", "desc")->first();

        //save menu
        $menu = new Menu;
        $menu->title = $request->title;
        $menu->slug  = $request->slug ?? url('/');
        $menu->redirect = $request->redirect ?? '';
        $menu->page_id = $request->page_id ? _d($request->page_id) : 0;
        $menu->blog_id = $request->blog_id ? _d($request->blog_id) : 0;
        $menu->status = $request->status ?? 0;
        $menu->icon = $request->icon ?? '';
        $menu->position = $request->position ?? 'top';
        $menu->parent_id = $request->parent_id ? _d($request->parent_id) : 0;
        $menu->sort_order = $request->sort_order ?? ($last_menu ? $last_menu->sort_order + 1 : 0);

        if ($menu->save()) {
            Session::flash('success', 'Menu added successfully.');
            return redirect(route('admin.menus.all'));
        } else {
            return back()->withErrors([['Something went wrong!']])->withInput($request->input());
        }
    }

    /**
     * module to show edit form
     */
    public function edit($id)
    {
        $menu = Menu::find(_d($id));
        $pages = Page::where("status", 1)->get();
        $blogs = Blog::where("status", 1)->get();
        $menus = Menu::where("status", 1)->where("id", "!=", _d($id))->get();
        return view('backend.menus.edit', compact('menu', 'pages', 'blogs', 'menus'));
    }

    /**
     * module to update menu data
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'     => 'required|string|max:255',
            'status'     => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input());
        }

        //save menu
        $menu = Menu::find(_d($id));

        if ($menu) {

            $menu->title = $request->title;
            $menu->slug  = $request->slug ?? url('/');
            $menu->redirect = $request->redirect ?? '';
            $menu->page_id = $request->page_id ? _d($request->page_id) : 0;
            $menu->blog_id = $request->blog_id ? _d($request->blog_id) : 0;
            $menu->status = $request->status ?? 0;
            $menu->icon = $request->icon ?? '';
            $menu->position = $request->position ?? 'top';
            $menu->parent_id = $request->parent_id ? _d($request->parent_id) : 0;
            $menu->sort_order = $request->sort_order ?? 0;

            if ($menu->save()) {
                Session::flash('success', 'Menu updated successfully.');
                return redirect(route('admin.menus.all'));
            } else {
                return back()->withErrors([['Something went wrong!']])->withInput($request->input());
            }
        } else {
            return back()->withErrors([['Menu not found!']])->withInput($request->input());
        }
    }

    /**
     * module to delete menu
     */
    public function destroy($id)
    {
        $menu = Menu::find(_d($id));
        if ($menu) {
            $menu->delete();
            Session::flash('success', 'Menu deleted successfully.');
            return redirect(route('admin.menus.all'));
        } else {
            return back()->with("error", "Menu not found!");
        }
    }
}
