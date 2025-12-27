<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_model;
use App\Models\Token_model;
use App\Models\Categories_model;
use App\Models\ProfessionalData_model;
use App\Models\ServicesData_model;
use App\Helpers\JwtHelper;
use App\Models\ProfessionalCategories_model;

class UserController extends Controller
{
    public function register_user(Request $request)
    {
        //  pr('here');
        $input = $request->all();
        $res = [];
        $res['status'] = 0;
        if ($input) {
            $data = [];
            $fullName = $input['fullName'];
            $nameArray = explode(' ', $fullName);
            // pr(count($nameArray));
            if (count($nameArray) > 1) {
                $data['mem_fname'] = $nameArray[0];
                $data['mem_lname'] = $nameArray[1];
            } else {
                $data['mem_fname'] = $nameArray[0];
            }

            // pr($data);
            $data['mem_email'] = $input['email'];
            $data['mem_phone'] = $input['phone'];
            $data['mem_password'] = md5($input['password']);
            $data['mem_type'] = 'professional';
            $data['mem_email_verified'] = 0;
            $data['email_verification_code'] = random_int(100000, 999999);
            $data['code_expiry_time'] = date('Y-m-d H:i:s', strtotime('+5 minute'));
            // pr($data);
            $user = User_model::create($data);
            // pr($user);
            if ($user) {
                $userToken = JwtHelper::generateAuthToken($user->id, $user->mem_email, $user->mem_type);

                $res['status'] = 1;
                $res['mem_type'] = $user->mem_type;
                $res['token'] = $userToken;
            }
        }

        return json_encode($res);
    }

    public function login_user(Request $request)
    {

        $validated_input = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // $input = $request->all();
        $res = array();
        // if($input){

        // $email = $input['email'];
        // $password = md5($input['password']);
        $user = User_model::where('mem_email', $validated_input['email'])->first();
        // pr($user);
        if (!$user) {
            return response()->json([
                'status' => 0,
                'message' => 'User does not exist. Please Register'
            ], 404);
        }

        $input_password = md5($validated_input['password']);
        if ($input_password != $user['mem_password']) {
            return response()->json([
                'status' => 0,
                'message' => 'Invalid Password',
            ], 401);
        }

        if ($user) {
            $tokenArray = Token_model::where('mem_id', $user->id)->first();
            // pr($tokenArray);
            if ($tokenArray) {
                $token = $tokenArray->token;
                $userData = JwtHelper::verifyAuthToken($token);
                $userData['token'] = $token;
                $userData['status'] = 1;
                $userData['mem_email_verified'] = $user->mem_email_verified;
                $userData['mem_type'] = $tokenArray->mem_type;
                $res['user_data'] = $userData;
            }
        } else {
            $res['msg'] = 'User does not exist. Please signup';
        }

        // }
        return json_encode($res);
    }

    public function verify_email(Request $request)
    {
        $input = $request->all();
        // pr($input);
        $res = array();
        $userData = JwtHelper::verifyAuthToken($input['token']);
        // dd($userData);
        // pr($userData);

        if (!empty($userData['id'])) {
            // pr('here');
            $user = User_model::where('id', $userData['id'])->first();
            // pr($userData);
            $currentTime = date('Y-m-d H:i:s');

            if ($currentTime > $user['code_expiry_time']) {
                $res['msg'] = "Code Expired. Please click resend code button";
                return json_encode($res);
            } else {
                if ($user['email_verification_code'] == $input['verify_code']) {
                    $user['mem_email_verified'] = 1;
                    $user['email_verification_code'] = null;
                    $user->save();

                    $res['mem_email_verified'] = $user['mem_email_verified'];
                    $res['mem_type'] = $user['mem_type'];
                    $res['msg'] = 'Email verified successfully';
                    return json_encode($res);
                } else {
                    $res['msg'] = 'Verification code is wrong';
                    return json_encode($res);
                }
            }
        } else {
            $res['msg'] = "Invalid Token";
            return json_encode($res);
        }
    }

    public function resend_verification_code(Request $request)
    {
        $input = $request->all();
        $res = [];
        $userData = JwtHelper::verifyAuthToken($input['token']);
        if (!empty($userData['id'])) {
            $user = User_model::where('id', $userData['id'])->first();

            $user['email_verification_code'] = random_int(100000, 999999);
            $user['code_expiry_time'] = date('Y-m-d H:i:s', strtotime('+5 minute'));
            $user->save();

            $res['msg'] = 'A new code has been send to your email';
            $res['status'] = 1;
            return json_encode($res);
        } else {
            $res['msg'] = 'Invalid Token';
            $res['status'] = 0;
            return json_encode($res);
        }
    }

    public function user_email_status(Request $request)
    {
        $input = $request->all();
        $res = [];
        // pr($input);
        $userData = JwtHelper::verifyAuthToken($input['token']);
        // pr($userData);
        if (!empty($userData['id'])) {
            $user = User_model::where('id', $userData['id'])->first();
            $res['user_data'] = $user;
            return json_encode($res);
        }

        $res['msg'] = 'invalid user';
        return json_encode($res);
    }

    public function buyer_profile_fetch(Request $request)
    {
        $input = $request->all();
        pr($input);
    }

    public function professional_user_register(Request $request)
    {
        //  pr('here');
        $input = $request->all();
        $res = [];
        $res['status'] = 0;
        $data = [];
        $professional_data = [];
        if ($input) {
            // if (empty($input['token'])) {
            //     // pr($input);
            //     $fullName = $input['fullName'];
            //     $nameArray = explode(' ', $fullName);
            //     // pr(count($nameArray));
            //     if (count($nameArray) > 1) {
            //         $data['mem_fname'] = $nameArray[0];
            //         $data['mem_lname'] = $nameArray[1];
            //     } else {
            //         $data['mem_fname'] = $nameArray[0];
            //     }

            //     // pr($data);
            //     $data['mem_email'] = $input['email'];
            //     $data['mem_phone'] = $input['phone'];
            //     $data['mem_password'] = md5($input['password']);
            //     $data['mem_type'] = 'professional';
            //     $data['mem_email_verified'] = 0;
            //     $data['email_verification_code'] = random_int(100000, 999999);
            //     $data['code_expiry_time'] = date('Y-m-d H:i:s', strtotime('+5 minute'));
            //     // pr($data);
            //     $user = User_model::create($data);
            //     // pr($user);
            //     if ($user) {
            //         $userToken = JwtHelper::generateAuthToken($user->id, $user->mem_email, $user->mem_type);

            //         $res['status'] = 1;
            //         $res['mem_type'] = $user->mem_type;
            //         $res['token'] = $userToken;
            //     }
            // }


            $servicesData = [];
            $userData = JwtHelper::verifyAuthToken($input['token']);
            // pr($userData);
            $professional_data['category'] = $input['category'];
            $professional_data['subCategories'] = $input['subCategories'];

            $professional_data['business_name'] = $input['business_name'];
            $professional_data['business_address'] = $input['business_address'];
            $professional_data['business_type'] = $input['businessType'];
            $professional_data['employees'] = $input['employees'];
            $professional_data['looking_for'] = $input['lookingFor'];
            $professional_data['payment_gateway'] = $input['payment'];
            // pr($professional_data['category']);
            $servicesData['mem_id'] = $userData['id'];
            $servicesData['cat_id'] =  $professional_data['category'];
            // $servicesData['parent_cat_id'] = $professional_data['category'];
            $professional_data['mem_id'] = $userData['id'];
            foreach ($professional_data['subCategories'] as $subCatId) {
                $servicesData['sub_cat_id'] = (int) trim($subCatId, "\"'");
                ServicesData_model::create($servicesData);
            }

            $pro_categories = ProfessionalCategories_model::create(['mem_id' => $userData['id'], 'cat_id' => $professional_data['category']]);

            // dd($professional_data['mem_id']);
            // pr($professional_data);

            $businessData = ProfessionalData_model::create($professional_data);
            $res['business_data'] = $businessData;
            $res['status'] = 1;
        }

        return json_encode($res);
    }

    public function professional_profile_fetch(Request $request)
    {
        $input = $request->all();
        $res = [];
        // pr($input);
        $tokenArray = JwtHelper::verifyAuthToken($input['token']);
        // pr($tokenArray);
        if (!$tokenArray['id']) {
            return response()->json([
                'status' => 0,
                'message' => 'Inavalid Token',
            ]);
        }
        $user = User_model::with(['professional_details'])->where('id', $tokenArray['id'])->first();

        // pr($user);

        $userData['profile'] = $user;

        return response()->json([
            'data' => $userData,
        ]);
        //return json_encode($res); // this method was working RETURN was missing
    }

    public function fetch_professional_services(Request $request)
    {
        $input = $request->all();
        $res = [];
        // pr($input);
        $tokenArray = JwtHelper::verifyAuthToken($input['token']);
        // pr($tokenArray);
        if (!$tokenArray['id']) {
            return response()->json([
                'status' => 0,
                'message' => 'Inavalid Token',
            ]);
        }


        $servicesData = ProfessionalCategories_model::with(['category', 'sub_categories', 'sub_categories.sub_category_row'])->where('mem_id', $tokenArray['id'])->get();

        // pr($servicesData);
        return json_encode(['data' => $servicesData]);
    }

    public function change_password(Request $request)
    {
        $input = $request->all();
        // pr($input);
        $tokenArray = JwtHelper::verifyAuthToken($input['token']);
        // pr($tokenArray);
        $user = User_model::where('id', $tokenArray['id'])->first();
        // pr($user);
        if (!$user) {
            return response()->json(['msg' => "Invalid User", 'password_status' => 1]);
        }

        $current_password = md5($input['current_password']);
        if ($user->mem_password == $current_password) {
            if ($input['new_password'] == $input['confirm_password']) {
                $user->mem_password = md5($input['confirm_password']);
                $user->save();
                return response()->json([
                    'msg' => 'Password updated Successfully',
                    'password_status' => 1
                ]);
            }
        }
        return response()->json([
            'password_status' => 0,
            'msg' => "New Password and confirm passwords are not same"
        ]);
    }

    public function add_new_service(Request $request){
        $input = $request->all();
        // pr($input);

        $tokenArray = JwtHelper::verifyAuthToken($input['token']);
        // pr($tokenArray);
        $selected_category['mem_id'] = $tokenArray['id'];
        $selected_category['cat_id'] = $input['cat_id'];
        ProfessionalCategories_model::create($selected_category);

        $subCatData = [];
        $subCatData['mem_id'] = $tokenArray['id'];
        // dd($input['sub_cat_ids'][1]);
        $subCatData['cat_id'] = $input['cat_id'];
        foreach($input['sub_cat_ids'] as $sub_cat){
            $subCatData['sub_cat_id'] = (int) trim($sub_cat, "\"'");
            // $subCatData['sub_cat_id'] = (int) trim($subCatId, "\"'");
            ServicesData_model::create($subCatData);
        }

         $servicesData = ProfessionalCategories_model::with(['category', 'sub_categories', 'sub_categories.sub_category_row'])->where('mem_id', $tokenArray['id'])->get();


        return response()->json(['data' => $servicesData,'status'=>1]);
    }

    public function delete_service(Request $request){
        $input = $request->all();
        // pr($input);

        $tokenArray = JwtHelper::verifyAuthToken($input['token']);
        ProfessionalCategories_model::where('cat_id',$input['cat_id'])->where('mem_id',$tokenArray['id'])->delete();

        ServicesData_model::where('cat_id',$input['cat_id'])->where('mem_id',$tokenArray['id'])->delete();

        return response()->json(['status'=>1]);
    }

    public function fetch_one_service(Request $request)
    {
        $input = $request->all();
        $res = [];
        // pr($input);
        $tokenArray = JwtHelper::verifyAuthToken($input['token']);
        // pr($tokenArray);
        if (!$tokenArray['id']) {
            return response()->json([
                'status' => 0,
                'message' => 'Inavalid Token',
            ]);
        }


        $serviceData = ProfessionalCategories_model::with(['category', 'sub_categories', 'sub_categories.sub_category_row'])->where('mem_id', $tokenArray['id'])->where('cat_id', $input['cat_id'])->get();

        // pr($serviceData);
        return json_encode(['data' => $serviceData]);
    }

    public function edit_service(Request $request){
        $input = $request->all();
        // pr($input);

        $tokenArray = JwtHelper::verifyAuthToken($input['token']);

        ProfessionalCategories_model::where('cat_id',$input['cat_id'])->where('mem_id',$tokenArray['id'])->get();

        ServicesData_model::where('cat_id',$input['cat_id'])->where('mem_id',$tokenArray['id'])->get();

        return response()->json(['status'=>1]);
    }
}