<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_model;
use App\Models\Token_model;
use App\Helpers\JwtHelper;

class UserController extends Controller
{
    public function register_user(Request $request){
        //  pr('here');
        $input = $request->all();
        $res = [];
        $res['status'] = 0;
        if($input){
            $data = [];
            $fullName = $input['fullName'];
            $nameArray = explode(' ',$fullName);
            // pr(count($nameArray));
            if(count($nameArray) > 1){
                $data['mem_fname'] = $nameArray[0];
                $data['mem_lname'] = $nameArray[1];
            }
            else{
                 $data['mem_fname'] = $nameArray[0];
            }

            // pr($data);
            $data['mem_email'] = $input['email'];
            $data['mem_phone'] = $input['phone'];
            $data['mem_password'] = md5($input['password']);
            $data['mem_type'] = 'client';
            $data['mem_email_verified'] = 0;
            $data['email_verification_code'] = random_int(100000, 999999);
            $data['code_expiry_time'] = date('Y-m-d H:i:s', strtotime('+5 minute'));
            // pr($data);
            $user = User_model::create($data);
            // pr($user);
            if($user){
            $userToken = JwtHelper::generateAuthToken($user->id, $user->mem_email, $user->mem_type);

            $res['status'] = 1;
            $res['mem_type'] = $user->mem_type;
            $res['token'] = $userToken;
            }

        }

        return json_encode($res);
    }

    public function login_user(Request $request){
        $input = $request->all();
        $res = array();
        if($input){

            $email = $input['email'];
            $password = md5($input['password']);
            $user = User_model::where('mem_email',$email)
                    ->where('mem_password',$password)
                    ->first();
            // pr($user);
            $tokenArray = Token_model::where('mem_id', $user->id)->first();
            if($tokenArray){
                $token = $tokenArray->token;
                $userData = JwtHelper::verifyAuthToken($token);
                $userData['token'] = $token;
                $userData['status'] = 1;
                $userData['mem_email_verified'] = $user->mem_email_verified;
                $res['user_data'] = $userData;
            }
        }
        return json_encode($res);
    }

    public function verify_email(Request $request){
        $input = $request->all();
        // pr($input);
        $res = array();
        $userData = JwtHelper::verifyAuthToken($input['token']);
        // dd($userData);
        // pr($userData);

        if(!empty($userData['id'])){
            // pr('here');
            $user = User_model::where('id',$userData['id'])->first();
            // pr($userData);
            $currentTime = date('Y-m-d H:i:s');

            if($currentTime > $user['code_expiry_time']){
                $res['msg'] = "Code Expired. Please click resend code button";
                return json_encode($res);
            }
            else{
                if($user['email_verification_code'] == $input['verify_code']){
                    $user['mem_email_verified'] = 1;
                    $user['email_verification_code'] = null;
                    $user->save();

                    $res['mem_email_verified'] = $user['mem_email_verified'];
                    $res['msg'] = 'Email verified successfully';
                    return json_encode($res);
                }
                else{
                    $res['msg'] = 'Verification code is wrong';
                    return json_encode($res);
                }
            }
        }
        else{
            $res['msg'] = "Invalid Token";
            return json_encode($res);
        }

    }

    public function resend_verification_code(Request $request){
        $input = $request->all();
        $res = [];
        $userData = JwtHelper::verifyAuthToken($input['token']);
        if(!empty($userData['id'])){
            $user = User_model::where('id',$userData['id'])->first();

            $user['email_verification_code'] = random_int(100000, 999999);
            $user['code_expiry_time'] = date('Y-m-d H:i:s', strtotime('+5 minute'));
            $user->save();

            $res['msg'] = 'A new code has been send to your email';
            return json_encode($res);
        }
        else{
            $res['msg'] = 'Invalid Token';
            return json_encode($res);
        }
    }

}
