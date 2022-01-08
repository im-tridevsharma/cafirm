<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BusinessCategoryController extends Controller
{
    /**
     * 
     * moduel to show all the business_categories
     */

    public function index(Request $request)
    {
        $business_categories = BusinessCategory::all();
        return view('backend.business_categories.index', compact('business_categories'));
    }

    /**module to show create new form 
     * 
     * 
     */
    public function create()
    {
        return view('backend.business_categories.add');
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
        $category = new BusinessCategory;
        $category->name = $request->name;
        $category->status = $request->status ?? 0;

        if ($category->save()) {
            Session::flash('success', 'Business Category added successfully.');
            return redirect(route('admin.business_categories.all'));
        } else {
            return back()->withErrors([['Something went wrong!']])->withInput($request->input());
        }
    }

    /**
     * module to show edit form
     */
    public function edit($id)
    {
        $category = BusinessCategory::find(_d($id));
        return view('backend.business_categories.edit', compact('category'));
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
        $category = BusinessCategory::find(_d($id));

        if ($category) {

            $category->name = $request->name;
            $category->status = $request->status ?? 0;

            if ($category->save()) {
                Session::flash('success', 'Business Category updated successfully.');
                return redirect(route('admin.business_categories.all'));
            } else {
                return back()->withErrors([['Something went wrong!']])->withInput($request->input());
            }
        } else {
            return back()->withErrors([['BusinessCategory not found!']])->withInput($request->input());
        }
    }

    /**
     * module to delete category
     */
    public function destroy($id)
    {
        $category = BusinessCategory::find(_d($id));
        if ($category) {
            $category->delete();
            Session::flash('success', 'Business Category deleted successfully.');
            return redirect(route('admin.business_categories.all'));
        } else {
            return back()->with("error", "Business Category not found!");
        }
    }
}
