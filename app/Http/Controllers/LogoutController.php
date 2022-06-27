<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class LogoutController extends Controller {

    //Load Login Index File...............
    function logout() {
        Auth::logout();
        session()->forget('user_id');
        session()->forget('role');
        session()->forget('rolename');
        session()->forget('username');
        session()->forget('userphoto');
        session()->forget('projectid');
        session()->flush();
        $notification = array(
            'message' => 'You have been logged out successfully.',
            'alert-type' => 'success'
        );
        return redirect('/')->with($notification);
    }

}
