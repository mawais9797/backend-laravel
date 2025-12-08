<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteContent;

class Pages extends Controller
{
    public function home(Request $request){
        // has_access(12);
       $page = Sitecontent::where('ckey', $request->segment(3))->first();
        if (empty($page)) {
            $page = new Sitecontent();
            $page->ckey = $request->segment(3);
            $page->code = '';
            $page->save();
        }
        $input = $request->all();
        // pr($request->all());
        if ($input) {
            if (!empty($page->code)) {
                $content_row = unserialize($page->code);
            } else {
                $content_row = [];
            }
            if (!is_array($content_row)) {
                $content_row = [];
            }
            for ($i = 1; $i <= 11; $i++) {
                if ($request->hasFile('image' . $i)) {
                    $request->validate([
                        'image' . $i => 'mimes:png,jpg,jpeg,svg,gif|max:40000',
                    ]);
                    $image = $request->file('image' . $i)->store('images', 'public');
                    if (!empty($image)) {
                        $input['image' . $i] = basename($image);
                    }
                }
            }
            $data = serialize(array_merge($content_row, $input));
            // pr($input);
            $page->ckey = $request->segment(3);
            $page->code = $data;
            $page->save();
            return redirect('admin/pages/' . $request->segment(3))->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Sitecontent::where('ckey', $request->segment(3))->first();
        if (!empty($this->data['row']->code)) {
            $this->data['sitecontent'] = unserialize($this->data['row']->code);
        } else {
            $this->data['sitecontent'] = [];
        }
        return view('admin.website_pages.site_home',$this->data);
    }

    public function about(Request $request){
          // has_access(12);
       $page = Sitecontent::where('ckey', $request->segment(3))->first();
        if (empty($page)) {
            $page = new Sitecontent();
            $page->ckey = $request->segment(3);
            $page->code = '';
            $page->save();
        }
        $input = $request->all();
        // pr($request->all());
        if ($input) {
            if (!empty($page->code)) {
                $content_row = unserialize($page->code);
            } else {
                $content_row = [];
            }
            if (!is_array($content_row)) {
                $content_row = [];
            }
            for ($i = 1; $i <= 11; $i++) {
                if ($request->hasFile('image' . $i)) {
                    $request->validate([
                        'image' . $i => 'mimes:png,jpg,jpeg,svg,gif|max:40000',
                    ]);
                    $image = $request->file('image' . $i)->store('images', 'public');
                    if (!empty($image)) {
                        $input['image' . $i] = basename($image);
                    }
                }
            }
            $data = serialize(array_merge($content_row, $input));
            // pr($input);
            $page->ckey = $request->segment(3);
            $page->code = $data;
            $page->save();
            return redirect('admin/pages/' . $request->segment(3))->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Sitecontent::where('ckey', $request->segment(3))->first();
        if (!empty($this->data['row']->code)) {
            $this->data['sitecontent'] = unserialize($this->data['row']->code);
        } else {
            $this->data['sitecontent'] = [];
        }
        return view('admin.website_pages.site_about', $this->data);
        // return view('admin.website_pages.site_about');
    }

    public function become_professional(Request $request){
          // has_access(12);
       $page = Sitecontent::where('ckey', $request->segment(3))->first();
        if (empty($page)) {
            $page = new Sitecontent();
            $page->ckey = $request->segment(3);
            $page->code = '';
            $page->save();
        }
        $input = $request->all();
        // pr($request->file());
        // pr($_FILES);
        if ($input) {
            if (!empty($page->code)) {
                $content_row = unserialize($page->code);
            } else {
                $content_row = [];
            }
            if (!is_array($content_row)) {
                $content_row = [];
            }
            for ($i = 1; $i <= 15; $i++) {
                if ($request->hasFile('image' . $i)) {
                    $request->validate([
                        'image' . $i => 'mimes:png,jpg,jpeg,svg,gif|max:40000',
                    ]);
                    $image = $request->file('image' . $i)->store('images', 'public');
                    if (!empty($image)) {
                        $input['image' . $i] = basename($image);
                    }
                }
            }
            $data = serialize(array_merge($content_row, $input));
            // pr($input);
            $page->ckey = $request->segment(3);
            $page->code = $data;
            $page->save();
            return redirect('admin/pages/' . $request->segment(3))->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Sitecontent::where('ckey', $request->segment(3))->first();
        if (!empty($this->data['row']->code)) {
            $this->data['sitecontent'] = unserialize($this->data['row']->code);
        } else {
            $this->data['sitecontent'] = [];
        }
        return view('admin.website_pages.site_become_professional', $this->data);
        // return view('admin.website_pages.site_about');
    }











     public function sherwood_home(Request $request)
    {
        // has_access(12);
       $page = Sitecontent::where('ckey', $request->segment(3))->first();
        if (empty($page)) {
            $page = new Sitecontent();
            $page->ckey = $request->segment(3);
            $page->code = '';
            $page->save();
        }
        $input = $request->all();
        // pr($request->all());
        if ($input) {
            if (!empty($page->code)) {
                $content_row = unserialize($page->code);
            } else {
                $content_row = [];
            }
            if (!is_array($content_row)) {
                $content_row = [];
            }
            for ($i = 1; $i <= 12; $i++) {
                if ($request->hasFile('image' . $i)) {
                    $request->validate([
                        'image' . $i => 'mimes:png,jpg,jpeg,svg,gif|max:40000',
                    ]);
                    $image = $request->file('image' . $i)->store('public/images/');
                    if (!empty($image)) {
                        $input['image' . $i] = basename($image);


                    }
                }
            }
            $data = serialize(array_merge($content_row, $input));
            // pr($input);
            $page->ckey = $request->segment(3);
            $page->code = $data;
            $page->save();
            return redirect('admin/pages/' . $request->segment(3))->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Sitecontent::where('ckey', $request->segment(3))->first();
        if (!empty($this->data['row']->code)) {
            $this->data['sitecontent'] = unserialize($this->data['row']->code);
        } else {
            $this->data['sitecontent'] = [];
        }
        return view('admin.website_pages.site_home_sherwood', $this->data);
    }
}
