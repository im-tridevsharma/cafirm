<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteConfig;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiteConfigController extends Controller
{

    /**
     * 
     * module to show general setting form
     */
    public function general()
    {
        $settings = [];
        $response = SiteConfig::all();
        foreach($response as $r){
            $settings[$r->key] = $r->value;
        }

        return view('backend.settings.general', compact('settings'));
    }

    /**
     * 
     * module to set key in bulk
     */
    public function set_bulk(Request $request)
    {

        if ($request->hasFile('site_logo')) {
            $md5Name = md5_file($request->file('site_logo')->getRealPath());
            $guessExtension = $request->file('site_logo')->guessExtension();
            $folder = '/uploads/logo/';
            $filename = $md5Name . '.' . $guessExtension;
            try {
                $request->file('site_logo')->move(public_path() . $folder, $filename);
            } catch (Exception $e) {
                return back()->withErrors([['Logo is failed to upload.']])->withInput($request->all());
            }

            $file_url = $folder . $filename;

            //delete old file
            if (file_exists(public_path($this->get('site_logo'))) && $this->get('site_logo')) {
                unlink(public_path($this->get('site_logo')));
            }

            $this->save('site_logo', $file_url);
        }


        if(!empty($request->key)){
            foreach($request->key as $key => $value){
                $this->save($key, $value);
            }

            Session::flash('success', 'General Settings updated successfully.');
            return back();
        }else{
            return back()->withErrors([['Data not found!']])->withInput($request->all());
        }
    }

    /**
     * save config
     */
    public function save($key, $value)
    {
        if(!empty($key)){
            $already = SiteConfig::where("key", $key)->first();
            $config = $already ? $already : new SiteConfig;
            $config->key = $key;
            $config->value = $value;

            $config->save();
            return true;
        }
    }

    /**
     * get key value
     */
    public function get($key)
    {
        if(!empty($key))
        {
            $setting = SiteConfig::where("key", $key)->first();
            return $setting ? $setting->value : '';
        }
    }
} 
