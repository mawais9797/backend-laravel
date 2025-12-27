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

    public function contact(Request $request){
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
        return view('admin.website_pages.site_contact', $this->data);
        // return view('admin.website_pages.site_about');
    }

    public function login(Request $request){
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
        return view('admin.website_pages.site_login', $this->data);

    }

    public function register(Request $request){
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
            for ($i = 1; $i <= 5; $i++) {
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
        $this->data['enable_editor'] = true;
        $this->data['row'] = Sitecontent::where('ckey', $request->segment(3))->first();
        if (!empty($this->data['row']->code)) {
            $this->data['sitecontent'] = unserialize($this->data['row']->code);
        } else {
            $this->data['sitecontent'] = [];
        }
        return view('admin.website_pages.site_register', $this->data);

    }

    public function trade_person_register(Request $request){
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
            for ($i = 1; $i <= 5; $i++) {
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

            $form3_titles = $request->input('form3_fields.title', []);
            $form3_fields = [];

            foreach ($form3_titles as $index => $title) {
                $form3_fields[] = [
                    'title' => $title
                ];
            }

            $form2_radio_titles_id = $request->input('form2_business_type.id', []);
            $form2_radio_titles = $request->input('form2_business_type.title', []);
            $form2_business_type = [];

            foreach ($form2_radio_titles as $index => $title) {
                $form2_business_type[] = [
                    'id' => $form2_radio_titles_id[$index] ?? Str::slug($title),
                    'title' => $title
                ];
            }


            $form2_employees_id = $request->input('form2_employees.id', []);
            $form2_employees_titles = $request->input('form2_employees.title', []);
            $form2_employees = [];

            // pr($form2_employees_titles);
            foreach ($form2_employees_titles as $index => $title) {
                $form2_employees[] = [
                    'id' => $form2_employees_id[$index] ?? Str::slug($title),
                    'title' => $title
                ];
            }

            //  pr($form2_employees);

            // $form2_business_type_titles = $request->input('form2_business_type.title', []);
            // $form2_business_type = [];

            // foreach ($form2_business_type_titles as $title) {
            //     $form2_business_type[] = ['title' => $title];
            // }

            // pr($form2_business_type);

            $input['form3_fields'] = $form3_fields;
            $input['form2_business_type'] = $form2_business_type;
            $input['form2_employees'] = $form2_employees;
            // pr($input);
            $data = serialize(array_merge($content_row, $input));
            // pr($input);
            $page->ckey = $request->segment(3);
            $page->code = $data;
            $page->save();
            return redirect('admin/pages/' . $request->segment(3))->with('success', 'Content Updated Successfully');
        }
        $this->data['enable_editor'] = true;
        $this->data['row'] = Sitecontent::where('ckey', $request->segment(3))->first();
        if (!empty($this->data['row']->code)) {
            $this->data['sitecontent'] = unserialize($this->data['row']->code);
        } else {
            $this->data['sitecontent'] = [];
        }
        // pr($this->data['sitecontent']);
        return view('admin.website_pages.site_trade_person_register', $this->data);

    }

    public function privacy_policy(Request $request){
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
            for ($i = 1; $i <= 5; $i++) {
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

            $form3_titles = $request->input('form3_fields.title', []);
            $form3_fields = [];

            foreach ($form3_titles as $index => $title) {
                $form3_fields[] = [
                    'title' => $title
                ];
            }

            // $data['form3_fields'] = json_encode($form3_fields);


            // Form 3 dynamic fields
            $form3Fields = $request->input('form3_fields', []);
            // pr($form3Fields);
            // $input['form3_fields'] = json_encode($form3Fields);
            $input['form3_fields'] = $form3_fields;
            // pr($input);
            $data = serialize(array_merge($content_row, $input));
            // pr($input);
            $page->ckey = $request->segment(3);
            $page->code = $data;
            $page->save();
            return redirect('admin/pages/' . $request->segment(3))->with('success', 'Content Updated Successfully');
        }
        $this->data['enable_editor'] = true;
        $this->data['row'] = Sitecontent::where('ckey', $request->segment(3))->first();
        if (!empty($this->data['row']->code)) {
            $this->data['sitecontent'] = unserialize($this->data['row']->code);
        } else {
            $this->data['sitecontent'] = [];
        }
        return view('admin.website_pages.site_privacy_policy', $this->data);

    }

    public function terms_conditions(Request $request){
          // has_access(12);
        //   pr('here');
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
            for ($i = 1; $i <= 5; $i++) {
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
        $this->data['enable_editor'] = true;
        $this->data['row'] = Sitecontent::where('ckey', $request->segment(3))->first();
        if (!empty($this->data['row']->code)) {
            $this->data['sitecontent'] = unserialize($this->data['row']->code);
        } else {
            $this->data['sitecontent'] = [];
        }
        return view('admin.website_pages.site_terms_conditions', $this->data);

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
