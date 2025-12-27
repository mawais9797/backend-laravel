<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories_model;
use App\helpers\JwtHelper;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories['rows'] = Categories_model::orderBy('id', 'ASC')->get();
        // $this->data['rows'] = Categories_model::orderBy('id', 'ASC')->get();
        // pr($categories);
        return view('admin.categories.index', $categories);
    }

    public function add_category(Request $request)
    {
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

                $image = $request->file($field)->store('categories', 'public');

                if (! empty(basename($image))) {
                    $data[$field] = basename($image);
                }
            }

            if (!empty($input['status'])) {
                $data['status'] = 1;
            } else {
                $data['status'] = 0;
            }
            $data['cat_name'] = $input['cat_name'];
            // pr($data);
            $id = Categories_model::create($data)->id;

            // $this->saveServiceBlock($id, $input);

            return redirect('admin/categories/index')
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['enable_editor'] = true;
        return view('admin.categories.index', $this->data);
    }

    public function edit_category(Request $request, $id)
    {
        $GalleryImage = Categories_model::find($id);
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

                $image = $request->file($field)->store('categories', 'public');

                if (! empty($image)) {
                    // Old image delete karne ka logic
                    $oldImageField = 'image';
                    if (! empty($GalleryImage->$oldImageField)) {
                        removeImage("categories/" . $GalleryImage->$oldImageField);
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
            $GalleryImage->cat_name = $input['cat_name'];
            // pr($GalleryImage);
            $GalleryImage->update();
            // $this->saveServiceBlock($id, $input);

            return redirect('admin/categories/index')
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Categories_model::find($id);
        $this->data['enable_editor'] = true;
        return view('admin.categories.index', $this->data);
    }

    public function delete_category($id)
    {
        $GalleryImage = Categories_model::find($id);
        removeImage("categories/" . $GalleryImage->image);
        $GalleryImage->delete();
        return redirect('admin/categories/index')
            ->with('error', 'Content deleted Successfully');
    }

    public function fetch_categories(Request $request)
    {
        $input = $request->all();
        // pr($input);
        $res = [];
        $categories = Categories_model::where('status', 1)->get();
        // pr($categories);
        $res['categories'] = $categories;
        // pr($res);
        return json_encode($res);
    }
}
