<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    /**
     * 
     * moduel to show all the teams
     */

    public function index(Request $request)
    {
        $teams = Team::all();
        return view('backend.teams.index', compact('teams'));
    }

    /**module to show create new form 
     * 
     * 
     */
    public function create()
    {
        return view('backend.teams.add');
    }

    /**module to save data of team
     * 
     */
    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'file'     => 'required|image|mimes:jpg,jpeg,png',
            'email'    => 'required|email',
            'mobile'   => 'required|integer',
            'content'  => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input());
        }

        $md5Name = md5_file($request->file('file')->getRealPath());
        $guessExtension = $request->file('file')->guessExtension();
        $folder = '/uploads/team/';
        $filename = $md5Name . '.' . $guessExtension;
        try {
            $request->file('file')->move(public_path() . $folder, $filename);
        } catch (Exception $e) {
            return back()->withErrors([['Image is failed to upload.']])->withInput($request->input());
        }


        $file_url = $folder . $filename;

        //save team
        $team = new Team;
        $team->name = $request->name;
        $team->email = $request->email??'';
        $team->mobile = $request->mobile??'';
        $team->content = $request->content ?? '';
        $team->designation = $request->designation ?? '';
        $team->image = $file_url;
        $team->status = $request->status ?? 0;

        if ($team->save()) {
            Session::flash('success', 'Team added successfully.');
            return redirect(route('admin.teams.all'));
        } else {
            return back()->withErrors([['Something went wrong!']])->withInput($request->input());
        }
    }

    /**
     * module to show edit form
     */
    public function edit($id)
    {
        $team = Team::find(_d($id));
        return view('backend.teams.edit', compact('team'));
    }

    /**
     * module to update team data
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|string|max:255',
            'file'     => 'image|mimes:jpg,jpeg,png',
            'email'    => 'required|email',
            'mobile'   => 'required|integer',
            'content'  => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->input());
        }

        //save team
        $team = Team::find(_d($id));

        if ($team) {

            if ($request->hasFile('file')) {
                $md5Name = md5_file($request->file('file')->getRealPath());
                $guessExtension = $request->file('file')->guessExtension();
                $folder = '/uploads/team/';
                $filename = $md5Name . '.' . $guessExtension;
                try {
                    $request->file('file')->move(public_path() . $folder, $filename);
                } catch (Exception $e) {
                    return back()->withErrors([['Image is failed to upload.']])->withInput($request->input());
                }

                $file_url = $folder . $filename;

                //delete old file
                if (file_exists(public_path($team->image_url))) {
                    unlink(public_path($team->image_url));
                }
            }

            $team->name = $request->name;
            $team->email = $request->email??'';
            $team->mobile = $request->mobile??'';
            $team->content = $request->content ?? '';
            $team->designation = $request->designation ?? '';
            $team->image = $file_url ?? $team->image;
            $team->status = $request->status ?? 0;

            if ($team->save()) {
                Session::flash('success', 'Team updated successfully.');
                return redirect(route('admin.teams.all'));
            } else {
                return back()->withErrors([['Something went wrong!']])->withInput($request->input());
            }
        } else {
            return back()->withErrors([['Team not found!']])->withInput($request->input());
        }
    }

    /**
     * module to delete team
     */
    public function destroy($id)
    {
        $team = Team::find(_d($id));
        if ($team) {
            //delete old file
            if (file_exists(public_path($team->image))) {
                unlink(public_path($team->image));
            }

            $team->delete();
            Session::flash('success', 'Team deleted successfully.');
            return redirect(route('admin.teams.all'));
        } else {
            return back()->with("error", "Team not found!");
        }
    }
}
