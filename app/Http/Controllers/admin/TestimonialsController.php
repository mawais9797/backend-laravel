<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonials_model;

class TestimonialsController extends Controller
{
    public function index(){
        $this->data['rows'] = Testimonials_model::orderBy('id','ASC')->get();
        return view('admin.testimonials.index', $this->data);
    }

     public function add_testimonials(Request $request){
        $input = $request->all();
        // pr($input);
        if ($input) {
            $data = [];
            // for ($i = 1; $i <= 5; $i++) {
            $field = 'image';

            if ($request->hasFile($field)) {
                $request->validate([
                    $field => 'mimes:png,jpg,jpeg,svg,gif,webp|max:40000',
                ]);

                $image = $request->file($field)->store('testimonials','public');

                if (! empty(basename($image))) {
                    $data[$field] = basename($image);
                }
            }

           if (!empty($input['status'])) {
                 $data['status'] = 1;
            } else {
                 $data['status'] = 0;
            }
            $data['name'] = $input['name'];
            $data['designation'] = $input['designation'];
            $data['message'] = $input['message'];
            // pr($data);
            $id = Testimonials_model::create($data)->id;

            // $this->saveServiceBlock($id, $input);

            return redirect('admin/testimonials/index')
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['enable_editor'] = true;
        return view('admin.testimonials.index', $this->data);
    }

     public function edit_testimonials(Request $request, $id){

        $GalleryImage = Testimonials_model::find($id);
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

                $image = $request->file($field)->store('testimonials','public');

                 if (! empty($image)) {
                    // Old image delete karne ka logic
                    $oldImageField = 'image';
                    if (! empty($GalleryImage->$oldImageField)) {
                        removeImage("testimonials/" . $GalleryImage->$oldImageField);
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
            $GalleryImage->name = $input['name'];
            $GalleryImage->designation = $input['designation'];
            $GalleryImage->message = $input['message'];
            // pr($GalleryImage);
            $GalleryImage->update();
            // $this->saveServiceBlock($id, $input);

            return redirect('admin/testimonials/index')
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Testimonials_model::find($id);
        $this->data['enable_editor'] = true;
        return view('admin.testimonials.index', $this->data);
    }
    public function delete_testimonials($id)
    {
        $GalleryImage = Testimonials_model::find($id);
        removeImage("testimonials/" . $GalleryImage->image);
        $GalleryImage->delete();
        return redirect('admin/testimonials/index')
            ->with('error', 'Content deleted Successfully');
    }
}
