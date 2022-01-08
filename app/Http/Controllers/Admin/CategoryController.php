<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * 
     * moduel to show all the categories
     */

    public function index(Request $request)
    {
        $categories = Category::all();
        return view('backend.categories.index', compact('categories'));
    }

    /**module to show create new form 
     * 
     * 
     */
    public function create()
    {
        return view('backend.categories.add');
    }

    /**module to save data of category
     * 
     */
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'status'     => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input());
        }

        //save category
        $category = new Category;
        $category->name = $request->name;
        $category->status = $request->status ?? 0;

        if ($category->save()) {
            Session::flash('success', 'Category added successfully.');
            return redirect(route('admin.categories.all'));
        } else {
            return back()->withErrors([['Something went wrong!']])->withInput($request->input());
        }
    }

    /**
     * module to show edit form
     */
    public function edit($id)
    {
        $category = Category::find(_d($id));
        return view('backend.categories.edit', compact('category'));
    }

    /**
     * module to update category data
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'status'     => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input());
        }

        //save category
        $category = Category::find(_d($id));

        if ($category) {

            $category->name = $request->name;
            $category->status = $request->status ?? 0;

            if ($category->save()) {
                Session::flash('success', 'Category updated successfully.');
                return redirect(route('admin.categories.all'));
            } else {
                return back()->withErrors([['Something went wrong!']])->withInput($request->input());
            }
        } else {
            return back()->withErrors([['Category not found!']])->withInput($request->input());
        }
    }

    /**
     * module to delete category
     */
    public function destroy($id)
    {
        $category = Category::find(_d($id));
        if ($category) {
            $category->delete();
            Session::flash('success', 'Category deleted successfully.');
            return redirect(route('admin.categories.all'));
        } else {
            return back()->with("error", "Category not found!");
        }
    }
}
