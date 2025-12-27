<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerImages_model;

class BannerImagesController extends Controller
{
    public function index(Request $request){
        $this->data['rows'] = BannerImages_model::orderBy('id','ASC')->get();
        // pr($this->data['rows']);
        return view('admin.banner_images.index', $this->data);
    }

    public function add_image(Request $request){
        $input = $request->all();
        if ($input) {
            $data = [];
            // for ($i = 1; $i <= 5; $i++) {
            $field = 'image';

            if ($request->hasFile($field)) {
                $request->validate([
                    $field => 'mimes:png,jpg,jpeg,svg,gif,webp|max:40000',
                ]);

                $image = $request->file($field)->store('images','public');

                if (! empty(basename($image))) {
                    $data[$field] = basename($image);
                }
            }

           if (!empty($input['status'])) {
                 $data['status'] = 1;
            } else {
                 $data['status'] = 0;
            }
            $id = BannerImages_model::create($data)->id;

            // $this->saveServiceBlock($id, $input);

            return redirect('admin/bannerimages/index')
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['enable_editor'] = true;
        return view('admin.banner_images.index', $this->data);
    }

     public function edit_image(Request $request, $id){

        $GalleryImage = BannerImages_model::find($id);
        $input = $request->all();
        // pr($GalleryImage);
         if ($input) {
            $data = [];
            // for ($i = 1; $i <= 5; $i++) {
            $field = 'image';

            if ($request->hasFile($field)) {
                $request->validate([
                    $field => 'mimes:png,jpg,jpeg,svg,gif,webp|max:40000',
                ]);

                $image = $request->file($field)->store('images','public');

                 if (! empty($image)) {
                    // Old image delete karne ka logic
                    $oldImageField = 'image';
                    if (! empty($GalleryImage->$oldImageField)) {
                        removeImage("images/" . $GalleryImage->$oldImageField);
                    }

                    // New image assign karna

                    $GalleryImage->$oldImageField = basename($image);
                }
            }

            // $GalleryImage->status = $input['status'];
            if (!empty($input['status'])) {
                $GalleryImage->status = 1;
            } else {
                $GalleryImage->status = 0;
            }

            // pr($GalleryImage);
            $GalleryImage->update();
            // $this->saveServiceBlock($id, $input);

            return redirect('admin/bannerimages/index')
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = BannerImages_model::find($id);
        $this->data['enable_editor'] = true;
        return view('admin.banner_images.index', $this->data);
    }
    public function delete_image($id)
    {
        $GalleryImage = BannerImages_model::find($id);
        removeImage("images/" . $GalleryImage->image);
        $GalleryImage->delete();
        return redirect('admin/bannerimages/index')
            ->with('error', 'Content deleted Successfully');
    }
}
