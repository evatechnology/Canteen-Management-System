<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Productstore;

class ExtraController extends Controller {

    public $userid;

    public function __construct() {
        $this->middleware(function($request, $next) {
            $this->userid = Session::get('user_id');
            if ($this->userid == '') {
                return redirect('/');
            }
            return $next($request);
        });
    }

    public function index() {
        $reults = Productstore::all();
        $totalprice = 0;
        foreach ($reults as $value) {
            $totalprice += $value->prosaleprice;
        }
        $data = [
            'totalqunatity' => DB::table('productstores')->sum(DB::raw('qunatity')),
            'salequantity' => DB::table('saleproboxs')->sum(DB::raw('salequantity')),
            'stockamount' => DB::table('productstores')->sum(DB::raw('subtotal')),
            'saleamount' => DB::table('saleproinvoices')->sum(DB::raw('payment')),
            'saledueamount' => DB::table('saleproinvoices')->where('dueamount', '!=', 0)->sum(DB::raw('dueamount')),
            'expenses' => DB::table('expenses')->sum(DB::raw('expamount')),
            'collections' => DB::table('collections')->sum(DB::raw('collection')),
        ];
        return view('dashboard', $data);
    }

    function geteuserinfo(Request $request) {
        $id = $request->get('id');
        $result = User::leftJoin('roles', 'users.role', '=', 'roles.roleid')->where('id', $id)->first();
        return response()->json($result);
    }

    public function profile() {
        $id = $this->userid;
        $data = [
            'userdetails' => User::leftJoin('roles', 'users.role', '=', 'roles.roleid')->where('id', $id)->first(),
        ];
        return view('administration.user.profile', $data);
    }

    public function update_user_details(Request $request) {
        $id = $request->userid;
        $status = $request->upstatus;

        if ($status == "Photo") {
            $result = User::where('id', $id)->first();
            unlink($result->photo);
            $image = $request->file('photo');
            $imagename = date('dmi') . substr(md5(rand()), 0, 10);
            $ext = strtolower($image->getClientOriginalExtension());
            $imagefullname = $imagename . '.' . $ext;
            $uploadpath = './public/users/';
            $image_url = $uploadpath . $imagefullname;
            \Intervention\Image\Facades\Image::make($image)->resize(200, 200)->save($image_url);
            $data['photo'] = $image_url;
            $uptype = "Photo";
        } elseif ($status == "Profile") {
            $data = [
                'name' => ucwords($request->name),
                'email' => $request->email,
                'contact' => $request->contact,
            ];
            $uptype = "Information";
        } else {
            $data = [
                'password' => Hash::make($request->password),
                'dispassword' => $request->password,
                'username' => $request->username,
                'role' => $request->role,
            ];
            $uptype = "Password";
        }
        User::where('id', $id)->update($data);

        $notification = array(
            'message' => $uptype . ' Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('/profile')->with($notification);
    }

}
