<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index(){

        return view('admin.login');
    }

    public function admin_register(Request $request){
        // print_r('hello');
        return view('admin/register');
    }

    public function register(Request $request){
        $input = $request->all();
        $res = [];
        $res['status'] = 0;
        if($input){
            $validated = $request->validate([
                'fname' => 'required|string|max:50',
                'lname' => 'required|string|max:50',
                'email' => 'required|email',
                'password' => 'required|min:4',
            ]);

            $data['fname'] = $validated['fname'];
            $data['lname'] = $validated['lname'];
            $data['email'] = $validated['email'];
            $data['password'] = md5($validated['password']);
            $data['mem_type'] = 'admin';

            // pr($data);
            $user = Admin::create($data);
            // pr($user);
            // $userToken = JwtHelper::generateAuthToken($user->id, $user->email,$user->mem_type);

            if($user){
                $request->session()->put('admin_id',$user->id);
                $request->session()->put('admin_email',$user->email);

                return redirect('admin/dashboard')
                ->with('success', 'Content Updated Successfully');
            }
            else{
                $res['msg'] = 'token not generated';
                return json_encode($res);
            }

        }
        else
            {
             return view('admin/register');
        }
    }

    public function admin_login(Request $request){

        return view('admin/login');
    }

    public function login(Request $request){
        $input = $request->all();
        // pr($input);
        $res = [];
        if($input){
            $user = Admin::where('email',$input['email'])->where('password',md5($input['password']))->first();
            if($user){
                $request->session()->put('admin_id',$user->id);
                $request->session()->put('admin_email',$user->email);

                return redirect('admin/dashboard');
            }
            else{
                return back()->with('error','invalid email or password');
            }
        }
    }

    public function dashboard()
    {
        try {
            $data = [];
            return view('admin/dashboard',$data);
            //code...
        } catch (\Throwable $th) {
            throw $th;

        }
    }

    public function logout(Request $request){
        $request->session()->flush(); // removes all session data
        return redirect('admin/login')->with('success', 'Logged out successfully.');
    }

    public function change_password(Request $request){
        $res=[];
        return view('admin.change_password',['site_settings',$res]);
    }

    public function update_password(Request $request){
        $input = $request->all();
        // pr($input);
        if($input['current_password']){
            $admin_id = $request->session()->get('admin_id');
            $admin = Admin::where('id',$admin_id)->first();
            if($admin->mem_type == 'admin'){
                $old_password = $admin->password;
                $current_password = md5($input['current_password']);

                // pr($current_password);

                if($old_password == $current_password){
                    if($input['new_password'] == $input['confirm_password']){
                        $admin->password = md5($input['new_password']);
                        $admin->save();
                        return redirect('admin/dashboard')->with('success', 'Admin password has been changed successfully');
                    }
                    else{
                        return redirect('admin/change-password')->with('error', 'New password not matching with confirm password');
                    }
                }
                else{
                    return redirect('admin/change-password')->with('error', 'Current password does not match');
                }
            }
            else{
                return redirect('admin/dashboard')->with('error', 'You are not authorized');
            }
        }
        else
        {
            return redirect('admin/change-password')->with('error', 'Please enter values');
        }

    }
}
