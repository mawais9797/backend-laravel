<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BannerImages_model;
use App\Models\Testimonials_model;
use App\Models\Categories_model;

class ContentPages extends Controller
{

    public function home(Request $request){
        // $token = $request->input('token', null);
        // $member = $this->authenticate_verify_token($token);
        $res = [];
        $res['content'] = get_page('home');
        // pr($res);
        // pr($res['content']);
        $res['page_title'] = $res['content']['page_title'] . ' - ' . $this->data['site_settings']->site_name;

        $res['banner_images'] = BannerImages_model::orderBy('id','ASC')->get();
        $res['testimonials'] = Testimonials_model::orderBy('id', 'ASC')->get();
        $res['category'] = Categories_model::orderBy('id', 'ASC')->get();



        $res['meta_desc'] = (object)[
            'meta_title' => $res['content']['meta_title'],
            'meta_description' => $res['content']['meta_description'],
            'meta_keywords' => $res['content']['meta_keywords'],
            'meta_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
            'og_title' => $res['content']['meta_title'],
            'og_description' => $res['content']['meta_description'],
            'meta_keywords' => $res['content']['meta_keywords'],
            'twitter_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
            'og_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
        ];
        // pr($res);
        exit(json_encode($res));
    }

     public function about(Request $request){
        // $token = $request->input('token', null);
        // $member = $this->authenticate_verify_token($token);
        $res = [];
        $res['content'] = get_page('about');
        // pr($res);
        // pr($res['content']);
        $res['page_title'] = $res['content']['page_title'] . ' - ' . $this->data['site_settings']->site_name;

        // $res['banner_images'] = BannerImages_model::orderBy('id','ASC')->get();
        $res['testimonials'] = Testimonials_model::orderBy('id', 'ASC')->get();
        // $res['category'] = Categories_model::orderBy('id', 'ASC')->get();



        $res['meta_desc'] = (object)[
            'meta_title' => $res['content']['meta_title'],
            'meta_description' => $res['content']['meta_description'],
            'meta_keywords' => $res['content']['meta_keywords'],
            'meta_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
            'og_title' => $res['content']['meta_title'],
            'og_description' => $res['content']['meta_description'],
            'meta_keywords' => $res['content']['meta_keywords'],
            'twitter_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
            'og_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
        ];
        // pr($res);
        exit(json_encode($res));
    }

     public function become_professional(Request $request){
        // $token = $request->input('token', null);
        // $member = $this->authenticate_verify_token($token);
        $res = [];
        $res['content'] = get_page('become-professional');
        // pr($res);
        // pr($res['content']);
        $res['page_title'] = $res['content']['page_title'] . ' - ' . $this->data['site_settings']->site_name;

        // $res['banner_images'] = BannerImages_model::orderBy('id','ASC')->get();
        // $res['testimonials'] = Testimonials_model::orderBy('id', 'ASC')->get();
        // $res['category'] = Categories_model::orderBy('id', 'ASC')->get();



        $res['meta_desc'] = (object)[
            'meta_title' => $res['content']['meta_title'],
            'meta_description' => $res['content']['meta_description'],
            'meta_keywords' => $res['content']['meta_keywords'],
            'meta_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
            'og_title' => $res['content']['meta_title'],
            'og_description' => $res['content']['meta_description'],
            'meta_keywords' => $res['content']['meta_keywords'],
            'twitter_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
            'og_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
        ];
        // pr($res);
        exit(json_encode($res));
    }

    public function contact(Request $request){
        //  $token = $request->input('token', null);
        // $member = $this->authenticate_verify_token($token);
        $res = [];
        // $res['content'] = get_page('home');
        $res['content'] = get_page('contact'); //ckey sherwoodhome

        // pr($res['content']);
        $res['page_title'] = $res['content']['page_title'] . ' - ' . $this->data['site_settings']->site_name;


        $res['meta_desc'] = (object)[
            'meta_title' => $res['content']['meta_title'],
            'meta_description' => $res['content']['meta_description'],
            'meta_keywords' => $res['content']['meta_keywords'],
            'meta_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
            'og_title' => $res['content']['meta_title'],
            'og_description' => $res['content']['meta_description'],
            'meta_keywords' => $res['content']['meta_keywords'],
            'twitter_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
            'og_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
        ];
        // pr($res);
        exit(json_encode($res));
    }

    public function login(Request $request){
        //  $token = $request->input('token', null);
        // $member = $this->authenticate_verify_token($token);
        $res = [];
        // $res['content'] = get_page('home');
        $res['content'] = get_page('login'); //ckey sherwoodhome

        // pr($res['content']);
        $res['page_title'] = $res['content']['page_title'] . ' - ' . $this->data['site_settings']->site_name;


        $res['meta_desc'] = (object)[
            'meta_title' => $res['content']['meta_title'],
            'meta_description' => $res['content']['meta_description'],
            'meta_keywords' => $res['content']['meta_keywords'],
            'meta_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
            'og_title' => $res['content']['meta_title'],
            'og_description' => $res['content']['meta_description'],
            'meta_keywords' => $res['content']['meta_keywords'],
            'twitter_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
            'og_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
        ];
        // pr($res);
        exit(json_encode($res));
    }

    public function register(Request $request){
        //  $token = $request->input('token', null);
        // $member = $this->authenticate_verify_token($token);
        $res = [];
        // $res['content'] = get_page('home');
        $res['content'] = get_page('register'); //ckey sherwoodhome

        // pr($res['content']);
        $res['page_title'] = $res['content']['page_title'] . ' - ' . $this->data['site_settings']->site_name;


        $res['meta_desc'] = (object)[
            'meta_title' => $res['content']['meta_title'],
            'meta_description' => $res['content']['meta_description'],
            'meta_keywords' => $res['content']['meta_keywords'],
            'meta_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
            'og_title' => $res['content']['meta_title'],
            'og_description' => $res['content']['meta_description'],
            'meta_keywords' => $res['content']['meta_keywords'],
            'twitter_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
            'og_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
        ];
        // pr($res);
        exit(json_encode($res));
    }

    public function trade_person_register(Request $request){
        //  $token = $request->input('token', null);
        // $member = $this->authenticate_verify_token($token);
        $res = [];
        // $res['content'] = get_page('home');
        $res['content'] = get_page('trade-person-register'); //ckey sherwoodhome

        // pr($res['content']);
        $res['page_title'] = $res['content']['page_title'] . ' - ' . $this->data['site_settings']->site_name;


        $res['meta_desc'] = (object)[
            'meta_title' => $res['content']['meta_title'],
            'meta_description' => $res['content']['meta_description'],
            'meta_keywords' => $res['content']['meta_keywords'],
            'meta_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
            'og_title' => $res['content']['meta_title'],
            'og_description' => $res['content']['meta_description'],
            'meta_keywords' => $res['content']['meta_keywords'],
            'twitter_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
            'og_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
        ];
        // pr($res);
        exit(json_encode($res));
    }

    public function privacy_policy(Request $request){
        //  $token = $request->input('token', null);
        // $member = $this->authenticate_verify_token($token);
        $res = [];
        // $res['content'] = get_page('home');
        $res['content'] = get_page('privacy-policy'); //ckey sherwoodhome

        // pr($res['content']);
        $res['page_title'] = $res['content']['page_title'] . ' - ' . $this->data['site_settings']->site_name;


        $res['meta_desc'] = (object)[
            'meta_title' => $res['content']['meta_title'],
            'meta_description' => $res['content']['meta_description'],
            'meta_keywords' => $res['content']['meta_keywords'],
            'meta_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
            'og_title' => $res['content']['meta_title'],
            'og_description' => $res['content']['meta_description'],
            'meta_keywords' => $res['content']['meta_keywords'],
            'twitter_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
            'og_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
        ];
        // pr($res);
        exit(json_encode($res));
    }

    public function terms_conditions(Request $request){
        //  $token = $request->input('token', null);
        // $member = $this->authenticate_verify_token($token);
        $res = [];
        // $res['content'] = get_page('home');
        $res['content'] = get_page('terms-conditions'); //ckey sherwoodhome

        // pr($res['content']);
        $res['page_title'] = $res['content']['page_title'] . ' - ' . $this->data['site_settings']->site_name;


        $res['meta_desc'] = (object)[
            'meta_title' => $res['content']['meta_title'],
            'meta_description' => $res['content']['meta_description'],
            'meta_keywords' => $res['content']['meta_keywords'],
            'meta_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
            'og_title' => $res['content']['meta_title'],
            'og_description' => $res['content']['meta_description'],
            'meta_keywords' => $res['content']['meta_keywords'],
            'twitter_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
            'og_image' => get_site_image_src('images', $this->data['site_settings']->site_thumb),
        ];
        // pr($res);
        exit(json_encode($res));
    }
}



