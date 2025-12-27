<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plans_model;

class PlansController extends Controller
{
    public function index(Request $request){
        $this->data['rows'] = Plans_model::orderBy('id','ASC')->get();
        return view('admin.plans.index', $this->data);
    }


    public function add_plan(Request $request){
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

                $image = $request->file($field)->store('plans','public');

                if (! empty(basename($image))) {
                    $data[$field] = basename($image);
                }
            }

           if (!empty($input['status'])) {
                 $data['status'] = 1;
            } else {
                 $data['status'] = 0;
            }
            $data['title'] = $input['title'];
            $data['price'] = $input['price'];
            $data['validity'] = $input['validity'];
            $data['feature1'] = $input['feature1'];
            $data['feature2'] = $input['feature2'];
            $data['feature3'] = $input['feature3'];
            $data['feature4'] = $input['feature4'];
            // pr($data);
            $id = Plans_model::create($data)->id;

            // $this->saveServiceBlock($id, $input);

            return redirect('admin/plans/index')
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['enable_editor'] = true;
        return view('admin.plans.index', $this->data);
    }

     public function edit_plan(Request $request, $id){

        $planData = Plans_model::find($id);
        $input = $request->all();
        // pr($planData);
         if ($input) {
            $data = [];
            // for ($i = 1; $i <= 5; $i++) {
            $field = 'image';

            if ($request->hasFile($field)) {
                $request->validate([
                    $field => 'mimes:png,jpg,jpeg,svg,gif,webp|max:40000',
                ]);

                $image = $request->file($field)->store('plans','public');

                 if (! empty($image)) {
                    // Old image delete karne ka logic
                    $oldImageField = 'image';
                    if (! empty($planData->$oldImageField)) {
                        removeImage("plans/" . $planData->$oldImageField);
                    }

                    // New image assign karna
                    $planData->$oldImageField = basename($image);
                }
            }

            // $planData->status = $input['status'];
            if (!empty($input['status'])) {
                $planData->status = 1;
            } else {
                $planData->status = 0;
            }

            $planData->title = $input['title'];
            $planData->price = $input['price'];
            $planData->validity = $input['validity'];
            $planData->feature1 = $input['feature1'];
            $planData->feature2 = $input['feature2'];
            $planData->feature3 = $input['feature3'];
            $planData->feature4 = $input['feature4'];
            // pr($planData);
            $planData->update();
            // $this->saveServiceBlock($id, $input);

            return redirect('admin/plans/index')
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Plans_model::find($id);
        $this->data['enable_editor'] = true;
        return view('admin.plans.index', $this->data);
    }

    public function delete_plan($id)
    {
        $planData = Plans_model::find($id);
        removeImage("plans/" . $planData->image);
        $planData->delete();
        return redirect('admin/plans/index')
            ->with('error', 'Content deleted Successfully');
    }

    public function fetch_plans(Request $request){
        $input = $request->all();
        // pr($input);
        $res = [];
        $plans = Plans_model::where('status',1)->get();
        // pr($plans);
        $res['plans'] = $plans;
        // pr($res);
        return json_encode($res);
    }
}
