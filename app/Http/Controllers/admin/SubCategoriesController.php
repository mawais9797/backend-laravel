<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategories_model;
use App\Models\Categories_model;

class SubCategoriesController extends Controller
{
    public function index()
    {
        $this->data['cats'] = Categories_model::orderBy('id', 'ASC')->get();
        $this->data['rows'] = SubCategories_model::orderBy('id', 'ASC')->get();
        // pr($categories);
        return view('admin.sub_categories.index', $this->data);
    }

    public function add_sub_category(Request $request)
    {
        $this->data['cats'] = Categories_model::orderBy('id', 'ASC')->get();
        $input = $request->all();
        // pr($input);
        if ($input) {
            $data = [];

            // $field = 'image';
            // if ($request->hasFile($field)) {
            //     $request->validate([
            //         $field => 'mimes:png,jpg,jpeg,svg,gif,webp|max:40000',
            //     ]);
            //     $image = $request->file($field)->store('sub_categories','public');
            //     if (! empty(basename($image))) {
            //         $data[$field] = basename($image);
            //     }
            // }

            if (!empty($input['status'])) {
                $data['status'] = 1;
            } else {
                $data['status'] = 0;
            }
            $data['parent_cat_id'] = $input['parent_cat_id'];
            $data['name'] = $input['name'];
            // pr($data);
            $id = SubCategories_model::create($data)->id;

            // $this->saveServiceBlock($id, $input);

            return redirect('admin/sub-categories/index')
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['enable_editor'] = true;
        return view('admin.sub_categories.index', $this->data);
    }

    public function edit_sub_category(Request $request, $id)
    {

        $subCatData = SubCategories_model::find($id);

        $input = $request->all();
        // pr($subCatData);
        if ($input) {
            $data = [];
            // for ($i = 1; $i <= 5; $i++) {

            // $field = 'image';
            // if ($request->hasFile($field)) {

            //     $request->validate([
            //         $field => 'mimes:png,jpg,jpeg,svg,gif,webp|max:40000',
            //     ]);

            //     $image = $request->file($field)->store('categories','public');

            //      if (! empty($image)) {
            //         // Old image delete karne ka logic
            //         $oldImageField = 'image';
            //         if (! empty($subCatData->$oldImageField)) {
            //             removeImage("categories/" . $subCatData->$oldImageField);
            //         }

            //         // New image assign karna
            //         $subCatData->$oldImageField = basename($image);
            //     }
            // }

            // $subCatData->status = $input['status'];
            if (!empty($input['status'])) {
                $subCatData->status = 1;
            } else {
                $subCatData->status = 0;
            }
            $subCatData->parent_cat_id = $input['parent_cat_id'];
            $subCatData->name = $input['name'];
            // pr($subCatData);
            $subCatData->update();
            // $this->saveServiceBlock($id, $input);

            return redirect('admin/sub-categories/index')
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['cats'] = Categories_model::orderBy('id', 'ASC')->get();
        $this->data['row'] = SubCategories_model::find($id);
        $this->data['enable_editor'] = true;
        return view('admin.sub_categories.index', $this->data);
    }

    public function delete_sub_category($id)
    {
        $subCatData = SubCategories_model::find($id);
        // removeImage("categories/" . $subCatData->image);
        $subCatData->delete();
        return redirect('admin/sub-categories/index')
            ->with('error', 'Content deleted Successfully');
    }

    public function fetch_subcategories(Request $request)
    {
        $input = $request->all();
        // pr($input);
        // $id = intval($input[0]);
        $id = intval($input['id']);
        // dd($id);
        $res = [];
        $sub_categories = SubCategories_model::where('parent_cat_id', $id)->get();
        // pr($categories);
        $res['sub_categories'] = $sub_categories;
        // pr($res);
        return json_encode($res);
    }
}
