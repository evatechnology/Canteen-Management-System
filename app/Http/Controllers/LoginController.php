<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller {

    public function __construct() {
        $this->middleware(function($request, $next) {
            $userid = Session::get('user_id');
            $role = Session::get('role');
            if (isset($userid) && !empty($userid)) {
                if ($role == 6) {
                    return redirect('/salespanel/sale');
                } else {
                     return redirect('/dashboard');
                }
            }
            return $next($request);
        });
    }

    public function index() {
        return view('login');
    }

    public function useraccess(Request $request) {
        $username = $request->username;
        $result = User::leftJoin('roles', 'users.role', '=', 'roles.roleid')->where('username', $username)->where('isActive', 1)->first();

        if ($result) {
            $credentials = $request->only('username', 'password');
            if (Auth()->attempt($credentials)) {
                $data = array(
                    'user_id' => $result->id,
                    'role' => $result->role,
                    'rolename' => $result->rolename,
                    'username' => $result->name,
                    'userphoto' => $result->photo,
                );
                $request->session()->put($data);
                if ($data['role'] == 6) {
                    return redirect()->to('/salespanel/sale');
                } else {
                    return redirect()->to('/dashboard');
                }
            } else {
                $notification = array(
                    'message' => 'Password is invalid',
                    'alert-type' => 'error'
                );
                return redirect('/')->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Username is invalid',
                'alert-type' => 'error'
            );
            return redirect('/')->with($notification);
        }
    }

}
