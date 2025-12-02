<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSettings_model;

class SiteSettingsController extends Controller
{
    public function index(){
        // $site_settings = null;
        // return view(' admin.site_settings', $data);
         $site = SiteSettings_model::where('id',5)->first();
        return view('admin.site_settings', ['site_settings' => $site]);
    }

    public function update_settings(Request $request){
        $input = $request->all();
        // pr($input);
        $siteData = [];

        $site = SiteSettings_model::where('id',5)->first();
        if($input){
            $request->validate([
                'site_logo'=> 'required|mimes:png,jpg,jpeg,svg,gif|max:40000',
                'site_favicon'=> 'required|mimes:png,jpg,jpeg,svg,gif|max:40000',
                'site_thumbnail'=> 'required|mimes:png,jpg,jpeg,svg,gif|max:40000',
                'site_name'      => 'nullable|max:255',
                'site_email'     => 'nullable|email|max:255',
                'site_email_noreply'     => 'nullable|email|max:255',
                'site_phone'     => 'nullable|max:255',
                'site_address'   => 'nullable|max:255',
                'site_about'     => 'nullable|max:255',
                'site_copyright'     => 'nullable|max:255',
                'site_logo'  => 'nullable|max:255',
                'site_favicon'   => 'nullable|max:255',
                'site_thumbnail'     => 'nullable|max:255',
                'site_themecolor'    => 'nullable|max:255',
                'site_facebook'  => 'nullable|max:255',
                'site_instagram'     => 'nullable|max:255',
                'site_twitter'   => 'nullable|max:255',
                'site_youtube'   => 'nullable|max:255',
                'site_meta_desc'     => 'nullable|max:255',
                'site_meta_keyword'  => 'nullable|max:255',
                'site_ft_heading1'   => 'nullable|max:255',
                'site_ft_heading2'   => 'nullable|max:255',
                'site_ft_heading3'   => 'nullable|max:255',
                'site_ft_heading4'   => 'nullable|max:255',
                'site_newsletter_tx'  => 'nullable|max:255',
            ]);
             // Get all form data
            $siteData = $request->all();
            // pr($siteData);
            // Handle image uploads
            if ($request->hasFile('site_logo')) {

                $path = $request->file('site_logo')->store('site_images', 'public');
                if(!empty($path)){
                    $oldImageField = 'site_logo';
                    if (! empty($site->$oldImageField)) {
                        removeImage("site_images/" . $site->$oldImageField);
                    }
                }
                $siteData['site_logo'] = basename($path);

            } else {
                $siteData['site_logo'] = $site->site_logo;
            }

            if ($request->hasFile('site_favicon')) {
                $path = $request->file('site_favicon')->store('site_images', 'public');
                if(!empty($path)){
                    $oldImageField = 'site_favicon';
                    if (! empty($site->$oldImageField)) {
                        removeImage("site_images/" . $site->$oldImageField);
                    }
                }
                $siteData['site_favicon'] = basename($path);
            } else {
                $siteData['site_favicon'] = $site->site_favicon;
            }

            if ($request->hasFile('site_thumbnail')) {
                $path = $request->file('site_thumbnail')->store('site_images', 'public');
                if(!empty($path)){
                    $oldImageField = 'site_thumbnail';
                    if (! empty($site->$oldImageField)) {
                        removeImage("site_images/" . $site->$oldImageField);
                    }
                }
                $siteData['site_thumbnail'] = basename($path);
            } else {
                $siteData['site_thumbnail'] = $site->site_thumbnail;
            }

            // pr($siteData);
            // ✅ Update all fields (images + other input)
            $site->update($siteData);
            $updatedSite = SiteSettings_model::find($site->id);
            // pr($updatedSite);
            return redirect()->back()->with('success', 'Site settings updated successfully!')->with('site_settings', $updatedSite);

        }

        return view('admin.site_settings',['site_settings',$site]);
    }

    public function site_content(Request $req){
        return view('admin.sitecontent');
    }


}
