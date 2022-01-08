<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * 
     * moduel to show all the blogs
     */

    public function index(Request $request)
    {
        $blogs = Blog::all();
        return view('backend.blogs.index', compact('blogs'));
    }

    /**module to show create new form 
     * 
     * 
     */
    public function create()
    {
        return view('backend.blogs.add');
    }

    /**module to save data of blog
     * 
     */
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'     => 'required|string|max:255',
            'slug'      => 'required',
            'content'   => 'required',
            'status'    => 'required',
            'cover_image' => 'required|mimes:jpg,jpeg,png'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input());
        }

        if (Blog::where("slug", $request->slug)->count()) {
            return back()->withErrors([['Slug is already exists in the system. Chage the title.']]);
        }

        $md5Name = md5_file($request->file('cover_image')->getRealPath());
        $guessExtension = $request->file('cover_image')->guessExtension();
        $folder = '/uploads/blogs/';
        $filename = $md5Name . '.' . $guessExtension;
        try {
            $request->file('cover_image')->move(public_path() . $folder, $filename);
        } catch (Exception $e) {
            return back()->withErrors([['Image is failed to upload.']])->withInput($request->input());
        }


        $file_url = $folder . $filename;

        //save blog
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->subtitle = $request->subtitle ?? '';
        $blog->slug = $request->slug ?? '';
        $blog->content = $request->content ?? '';
        $blog->cover   = $file_url;
        $blog->category = $request->category ?? '';
        $blog->status = $request->status ?? 0;

        if ($blog->save()) {
            Session::flash('success', 'Blog added successfully.');
            return redirect(route('admin.blogs.all'));
        } else {
            return back()->withErrors([['Something went wrong!']])->withInput($request->input());
        }
    }

    /**
     * module to show edit form
     */
    public function edit($id)
    {
        $blog = Blog::find(_d($id));
        return view('backend.blogs.edit', compact('blog'));
    }

    /**
     * module to show comments for a blog
     */
    public function comments($id)
    {
        $comments = BlogComment::where("blog_id", _d($id))->orderBy("id","desc")->get();
        return view('backend.blogs.comments', compact('comments'));
    }

    /**
     * module to update blog data
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'     => 'required|string|max:255',
            'slug'      => 'required',
            'content'   => 'required',
            'status'    => 'required',
            'cover_image' => 'mimes:jpg,jpeg,png'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input());
        }

        if (Blog::where("slug", $request->slug)->count() > 1) {
            return back()->withErrors([['Slug is already exists in the system. Chage the title.']]);
        }

        //save blog
        $blog = Blog::find(_d($id));
        if ($blog) {
            if ($request->hasFile('cover_image')) {
                $md5Name = md5_file($request->file('cover_image')->getRealPath());
                $guessExtension = $request->file('cover_image')->guessExtension();
                $folder = '/uploads/banner/';
                $filename = $md5Name . '.' . $guessExtension;
                try {
                    $request->file('file')->move(public_path() . $folder, $filename);
                } catch (Exception $e) {
                    return back()->withErrors([['Image is failed to upload.']])->withInput($request->input());
                }

                $file_url = $folder . $filename;

                //delete old file
                if (file_exists(public_path($blog->cover))) {
                    unlink(public_path($blog->cover));
                }
            }

            $blog->title = $request->title;
            $blog->subtitle = $request->subtitle ?? '';
            $blog->slug = $request->slug ?? '';
            $blog->content = $request->content ?? '';
            $blog->category = $request->category ?? '';
            $blog->cover = $file_url ?? $blog->cover;
            $blog->status = $request->status ?? 0;

            if ($blog->save()) {
                Session::flash('success', 'Blog updated successfully.');
                return redirect(route('admin.blogs.all'));
            } else {
                return back()->withErrors([['Something went wrong!']])->withInput($request->input());
            }
        }
    }

    /**
     * module to delete blog
     */
    public function destroy($id)
    {
        $blog = Blog::find(_d($id));
        if ($blog) {
            //delete old file
            if (file_exists(public_path($blog->cover)) && $blog->cover) {
                unlink(public_path($blog->cover));
            }
            $blog->delete();
            Session::flash('success', 'Blog deleted successfully.');
            return redirect(route('admin.blogs.all'));
        } else {
            return back()->with("error", "Blog not found!");
        }
    }
}
