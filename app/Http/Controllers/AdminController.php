<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
//use Carbon\Carbon;
use App\Models\User;
use App\Models\Productstore;

class AdminController extends Controller {

    public $userid;

    public function __construct() {
        $this->middleware(function($request, $next) {
            $this->userid = Session::get('user_id');
            $role = Session::get('role');
            if($role==6){
                return redirect('salespanel/sale');
            }
            if ($this->userid == '') {
                return redirect('/');
            }
            return $next($request);
        });
    }

    public function index() {
        $month= date('F-Y');
        $reults = Productstore::all();
        $totalprice = 0;
        foreach ($reults as $value) {
            $totalprice += $value->prosaleprice;
        }
        $data = [
            'olprodqty' => DB::table('productstores')->sum(DB::raw('olprodqty')),
            'salequantity' => DB::table('saleproboxs')->sum(DB::raw('salequantity')),
            'stockamount' => DB::table('productstores')->sum(DB::raw('subtotal')),
            'saleamount' => DB::table('saleproinvoices')->sum(DB::raw('payment')),
            'saledueamount' => DB::table('saleproinvoices')->where('dueamount','!=', 0)->sum(DB::raw('dueamount')),
            'expenses' => DB::table('expenses')->sum(DB::raw('expamount')),
            'collections' => DB::table('collections')->sum(DB::raw('collection')),
        ];
        return view('dashboard', $data);
    }

    /*
     * ***************************************Suppliers Data**************************************
     */

    public function suppliers() {
        $data = [
            'totalsuppliers' => DB::table('suppliers')->count(),
            'getsuppliers' => DB::table('suppliers')->orderBy('supid', 'desc')->paginate(100),
        ];
        return view('suppliers.index', $data);
    }

    public function supplierpros($id) {
        $data = [
            'getsuppliers' => DB::table('suppliers')->where('supid', $id)->first(),
            'prosuppliers' => DB::table('prostoreinfos')->where('supplier', $id)->get(),
        ];
        return view('suppliers.prospage', $data);
    }

    public function check_duplicate_supplier(Request $request) {
        $type = $request->get('type');
        $value = $request->get('value');
        if ($type == "phone") {
            $result = DB::table('suppliers')->where('suppmobile', $value)->first();
            if ($result) {
                if ($result->suppmobile == $value) {
                    $message = "Yes";
                }
            } else {
                $message = "No";
            }
            return $message;
        } else {
            $result = DB::table('suppliers')->where('suppemail', $value)->first();
            if ($result) {
                if ($result->suppemail == $value) {
                    $message = "Yes";
                }
            } else {
                $message = "No";
            }
            return $message;
        }
    }

    public function savesuppliers(Request $request) {
        $data = [
            'suppname' => ucwords($request->suppname),
            'suppmobile' => $request->suppmobile,
            'suppemail' => $request->suppemail,
            'suppaddress' => $request->suppaddress,
        ];
        DB::table('suppliers')->insert($data);
        $notification = array(
            'message' => 'Information Saved Successfully',
            'alert-type' => 'success'
        );
        return redirect('/suppliers')->with($notification);
    }

    function gete_supplier_info(Request $request) {
        $id = $request->get('id');
        $result = DB::table('suppliers')->where('supid', $id)->first();
        return response()->json($result);
    }

    function updatesuppliers(Request $request) {
        $id = $request->supid;
        $data = [
            'suppname' => ucwords($request->suppname),
            'suppmobile' => $request->suppmobile,
            'suppemail' => $request->suppemail,
            'suppaddress' => $request->suppaddress,
        ];
        DB::table('suppliers')->where('supid', $id)->update($data);
        $notification = array(
            'message' => 'Information Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('/suppliers')->with($notification);
    }

    public function deletesupplierdata($id) {
        DB::table('suppliers')->where('supid', $id)->delete();
        $notification = array(
            'message' => 'Information Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect('/suppliers')->with($notification);
    }

    /*
     * ***************************************Members Data**************************************
     */

    public function members() {
        $data = [
            'getmemrank' => DB::table('ranks')->get(),
            'totalmembers' => DB::table('members')->count(),
            'getmembers' => DB::table('members')->orderBy('memberrank', 'asc')->paginate(100),
        ];
        return view('members.index', $data);
    }

    public function check_duplicate_member(Request $request) {
        $value = $request->get('value');
        $result = DB::table('members')->where('memberidno', $value)->first();
        if ($result) {
            if ($result->memberidno == $value) {
                $message = "Yes";
            }
        } else {
            $message = "No";
        }
        return $message;
    }

    public function savemembers(Request $request) {
        $data = [
            'memberidno' => strtoupper($request->memberidno),
            'memberrank' => $request->memberrank,
            'membername' => ucwords($request->membername),
            'memberphone' => $request->memberphone,
        ];
        DB::table('members')->insert($data);
        $notification = array(
            'message' => 'Information Saved Successfully',
            'alert-type' => 'success'
        );
        return redirect('/members')->with($notification);
    }

//    public function savemembers(Request $request) {
//        $memberidno = $request->memberidno;
//        $membername = $request->membername;
//        $membermobile = $request->membermobile;
//        $count = count((array) $memberidno);
//        for ($i = 0; $i < $count; $i++) {
//            $data = [
//                'memberidno' => $memberidno[$i],
//                'membername' => ucwords($membername[$i]),
//                'membermobile' => $membermobile[$i],
//            ];
//            DB::table('members')->insert($data);
//        }
//        $notification = array(
//            'message' => 'Information Saved Successfully',
//            'alert-type' => 'success'
//        );
//        return redirect('/members')->with($notification);
//    }

    function gete_member_info(Request $request) {
        $id = $request->get('id');
        $result = DB::table('members')->where('memid', $id)->first();
        return response()->json($result);
    }

    function updatemember(Request $request) {
        $id = $request->memberid;
        $data = [
            'memberidno' => $request->memberidno,
            'memberrank' => $request->memberrank,
            'membername' => ucwords($request->membername),
            'memberphone' => $request->memberphone,
        ];
        DB::table('members')->where('memid', $id)->update($data);
        $notification = array(
            'message' => 'Information Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('/members')->with($notification);
    }

    public function deletememberdata($id) {
        DB::table('members')->where('memid', $id)->delete();
        $notification = array(
            'message' => 'Information Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect('/members')->with($notification);
    }

    //Search Members
    
    public function searchmember(Request $request) {
        
        $communication = $request->get('memno');
        $subject = $request->get('name');
        $corsender = $request->get('contact');
        
        
        $getmembers=DB::table('members')->
        when($subject, function($query, $subject) {
            return $query->where('membername', 'like', '%' . $subject . '%');
        })
        ->when($communication, function($query, $communication) {
            return $query->where('memberidno', $communication);
        })
        ->when($corsender, function($query, $corsender) {
            return $query->where('memberphone', $corsender);
        })
        ->get();
        
        $totalmembers=count($getmembers);
        
        $data = [
            'getmemrank' => DB::table('ranks')->get(),
            'totalmembers' =>$totalmembers,
            'getmembers' =>$getmembers,
        ];
        
        return view('members.search', $data);
    }


    public function membersales($value) {
        $month = date('F-Y');
        $data = [
            'monthname' => DB::table('months')->get(),
            'getmembers' => DB::table('members')->where('memberidno', $value)->first(),
            'saleproinvoices' => DB::table('saleproinvoices')->where('memberidno', $value)->where('invomonth', $month)->get(),
            'saleproboxs' => DB::table('saleproboxs')->orderBy('saleboxid', 'desc')->where('member', $value)->where('salemonth', $month)->get(),
        ];
        return view('members.salepage', $data);
    }

    //memberprosales
    public function memberprosales(Request $request) {
        $fromdate = $request->get('fdate');
        $todate = $request->get('tdate');

        if (!empty($fromdate) && !empty($todate)) {
            $fromtarik = date('Y-m-d', strtotime($fromdate));
            $totarik = date('Y-m-d', strtotime($todate));
            $status = 'yesdate';
        } else {
            $status = 'nodate';
        }
        $month = $request->get('month') . '-' . $request->get('year');
        $member = $request->get('member');

        if ($status == 'yesdate') {
            $saleproinvoices = DB::table('saleproinvoices')->whereDate('invodate', '>=', $fromtarik)->whereDate('invodate', '<=', $totarik)->where('memberidno', $member)->get();
            $saleproboxs = DB::table('saleproboxs')->whereDate('saledate', '>=', $fromtarik)->whereDate('saledate', '<=', $totarik)->where('member', $member)->get();
        } else {
            $saleproinvoices = DB::table('saleproinvoices')->where('invomonth', $month)->where('memberidno', $member)->get();
            $saleproboxs = DB::table('saleproboxs')->where('salemonth', $month)->where('member', $member)->get();
        }
        $data = [
            'getmembers' => DB::table('members')->where('memberidno', $member)->first(),
            'saleproinvoices' => $saleproinvoices,
            'saleproboxs' => $saleproboxs,
        ];
        return view('members.salerepo', $data);
    }

    public function dueamount($value) {
        $month = date('F-Y');
        $data = [
            'getmembers' => DB::table('members')->where('memberidno', $value)->first(),
            'collections' => DB::table('saleproinvoices')->where('memberidno', $value)->where('dueamount', 0)->where('invomonth', $month)->get(),
            'duecollections' => DB::table('saleproinvoices')->where('memberidno', $value)->where('dueamount', '!=', 0)->where('invomonth', $month)->get(),
            'monthname' => DB::table('months')->get(),
        ];
        return view('members.collections', $data);
    }

    public function membercollection(Request $request) {
        $type = $request->get('type');
        $fromdate = $request->get('fdate');
        $todate = $request->get('tdate');

        if (!empty($fromdate) && !empty($todate)) {
            $fromtarik = date('Y-m-d', strtotime($fromdate));
            $totarik = date('Y-m-d', strtotime($todate));
            $status = 'yesdate';
        } else {
            $status = 'nodate';
        }
        $month = $request->get('month') . '-' . $request->get('year');
        $member = $request->get('member');

        if ($type == "paid") {
            if ($status == 'yesdate') {
                $collections = DB::table('saleproinvoices')->where('dueamount', 0)->whereDate('invodate', '>=', $fromtarik)->whereDate('invodate', '<=', $totarik)->where('memberidno', $member)->get();
            } else {
                $collections = DB::table('saleproinvoices')->where('invomonth', $month)->where('dueamount', 0)->where('memberidno', $member)->get();
            }
        } else {
            if ($status == 'yesdate') {
                $duecollections = DB::table('saleproinvoices')->where('dueamount', '!=', 0)->whereDate('invodate', '>=', $fromtarik)->whereDate('invodate', '<=', $totarik)->where('memberidno', $member)->get();
            } else {
                $duecollections = DB::table('saleproinvoices')->where('dueamount', '!=', 0)->where('invomonth', $month)->where('memberidno', $member)->get();
            }
        }
        if ($type == "paid") {
            $data = [
                'getmembers' => DB::table('members')->where('memberidno', $member)->first(),
                'collections' => $collections,
            ];
            return view('members.paid', $data);
        } else {
            $data = [
                'getmembers' => DB::table('members')->where('memberidno', $member)->first(),
                'duecollections' => $duecollections,
            ];
            return view('members.due', $data);
        }
    }

    /*
     * ***************************************Sibgle Preset Data**************************************
     */

    public function administration($value) {
        $data = [
            'getcategorys' => DB::table('singledatas')->where('status', 'category')->get(),
            'getbrands' => DB::table('singledatas')->where('status', 'brand')->get(),
            'singledatas' => DB::table('singledatas')->select('status')->distinct()->orderBy('status', 'asc')->get(),
            'getroles' => DB::table('roles')->get(),
            'activeusers' => User::leftJoin('roles', 'users.role', '=', 'roles.roleid')->where('isActive',1)->where('isActive',1)->get(),
            'inactiveusers' => User::leftJoin('roles', 'users.role', '=', 'roles.roleid')->where('isActive',0)->where('isDelete',0)->get(),
        ];
        if ($value == "presetdata") {
            return view('administration.data.index', $data);
        } elseif ($value == "users") {
            return view('administration.user.index', $data);
        } else {
            return view('administration.activity.index', $data);
        }
    }

    public function get_category_information() {
        $results = DB::table('singledatas')->where('status', 'category')->get();
        echo '<option value="">Select Category</option>';
        foreach ($results as $value) {
            echo '<option value="' . $value->singledata . '">' . $value->singledata . '</option>';
        }
    }

    function savepresetdata(Request $request) {
        $status = $request->datatype;
        $dataname = $request->dataname;

        foreach ($dataname as $value) {
            $data = [
                'singledata' => ucwords($value),
                'status' => $status,
            ];
            DB::table('singledatas')->insert($data);
        }

        $notification = array(
            'message' => 'Information Saved Successfully',
            'alert-type' => 'success'
        );
        return redirect('/administration/presetdata')->with($notification);
    }

    public function saveprodata(Request $request) {
        $category = $request->category;
        $count = count((array) $category);
        for ($i = 0; $i < $count; $i++) {
            $data = [
                'category' => $category[$i],
                'brand' => $request->brand[$i],
                'product' => ucwords($request->product[$i]),
            ];
            DB::table('catproducts')->insert($data);
        }
        $notification = array(
            'message' => 'Information Saved Successfully',
            'alert-type' => 'success'
        );
        return redirect('/administration/presetdata')->with($notification);
    }

    function viewpresetdata($value) {
        $data = [
            'datatype' => $value,
            'singledatas' => DB::table('singledatas')->where('status', $value)->get(),
            'getcatproducts' => DB::table('catproducts')->orderBy('catproid', 'desc')->get(),
            'getcategorys' => DB::table('singledatas')->where('status', 'category')->get(),
            'getbrands' => DB::table('singledatas')->where('status', 'brand')->get(),
        ];
        if ($value == "product") {
            return view('administration.data.editpros', $data);
        } else {
            return view('administration.data.edit', $data);
        }
    }

//
//    function getpresetdata(Request $request) {
//        $value = $request->get('value');
//
//        $result = DB::table('singledatas')->where('status', $value)->get();
//        $i = 1;
//        foreach ($result as $value) {
//            echo "<tr style='text-align: center'>";
//            echo "<td>" . $i . "</td>";
//            echo "<td>" . $value->singledata . "</td>";
//            echo '<td>';
//            echo '<button style="border-radius:10px" class="btn btn-outline-info manageDataentry" id="' . $value->singledata_id . '" value="edit" style="text-align: center" data-toggle="tooltip" title="Edit"><i class="fa fa-edit font_awesome"></i></button>';
//            echo '<button style="border-radius:10px" class="btn btn-outline-danger manageDataentry" id="' . $value->singledata_id . '" value="delete" style="text-align: center" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o font_awesome"></i></button>';
//            echo '</td>';
//            echo "</tr>";
//            $i++;
//        }
//    }

    function gete_presetdata_info(Request $request) {
        $id = $request->get('id');
        $value = $request->get('value');
        if ($value == "product") {
            $result = DB::table('catproducts')->where('catproid', $id)->first();
        } else {
            $result = DB::table('singledatas')->where('id', $id)->first();
        }
        return response()->json($result);
    }

    function updatepresetdata(Request $request) {
        $id = $request->singledata_id;
        $status = $request->status;
        if ($status == "product") {
            $data = [
                'category' => $request->category,
                'brand' => $request->brand,
                'product' => ucwords($request->product),
            ];
            DB::table('catproducts')->where('catproid', $id)->update($data);
        } else {
            $data = [
                'singledata' => $request->dataname,
            ];
            DB::table('singledatas')->where('id', $id)->update($data);
        }

        $notification = array(
            'message' => 'Information Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('/viewpresetdata/' . $status)->with($notification);
    }

    function delete_presetdatas($id, $status) {
        if ($status == "product") {
            DB::table('catproducts')->where('catproid', $id)->delete();
        } else {
            DB::table('singledatas')->where('id', $id)->delete();
        }
        $notification = array(
            'message' => 'Information Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect('/viewpresetdata/' . $status)->with($notification);
    }

    /*
     * ***************************************Manage Users Data**************************************
     */

    public function check_duplicate_user(Request $request) {
        $value = $request->get('value');
        $result = User::where('username', $value)->first();
        if ($result) {
            if ($result->username == $value) {
                $message = "This User Already Exist !";
            }
        } else {
            $message = " ";
        }
        return $message;
    }

    public function save_newuser_details(Request $request) {
        $image = $request->file('photo');
        $imagename = date('dmi') . substr(md5(rand()), 0, 10);
        $ext = strtolower($image->getClientOriginalExtension());
        $imagefullname = $imagename . '.' . $ext;
        $uploadpath = './public/users/';
        $image_url = $uploadpath . $imagefullname;
        \Intervention\Image\Facades\Image::make($image)->resize(200, 200)->save($image_url);

        $data = array(
            'name' => ucwords($request->fname) . ' ' . ucwords($request->lname),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dispassword' => $request->password,
            'contact' => $request->contact,
            'username' => $request->username,
            'role' => $request->role,
            'photo' => $image_url,
            'isActive' => 1,
            'isDelete'=>1,
        );
        User::insert($data);
        $notification = array(
            'message' => 'New User Created Successfully',
            'alert-type' => 'success'
        );
        return redirect('/administration/users')->with($notification);
    }

    function gete_user_info(Request $request) {
        $id = $request->get('id');
        $result = User::leftJoin('roles', 'users.role', '=', 'roles.roleid')->where('id', $id)->first();
        return response()->json($result);
    }

    public function update_user_details(Request $request) {
        $id = $request->userid;
        $status = $request->upstatus;
        $ustatus = $request->uprofile;

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
            $uptype = "User Photo";
        } elseif ($status == "Profile") {
            $data = [
                'name' => ucwords($request->name),
                'email' => $request->email,
                'contact' => $request->contact,
            ];
            $uptype = "User Information";
        } else {
            $data = [
                'password' => Hash::make($request->password),
                'dispassword' => $request->password,
                'username' => $request->username,
                'role' => $request->role,
            ];
            $uptype = "User Access";
        }
        User::where('id', $id)->update($data);

        $notification = array(
            'message' => $uptype . ' Updated Successfully',
            'alert-type' => 'success'
        );

        if ($ustatus == "profile") {
            return redirect('/profile')->with($notification);
        } else {
            return redirect('/administration/users')->with($notification);
        }
    }

    function update_useraccess($id, $value) {
        if ($value == 1) {
            User::where('id', $id)->update(['isActive' => 1, 'isDelete' => 1]);
            $status = 'Activated';
        } else {
            User::where('id', $id)->update(['isActive' => 0, 'isDelete' => 0]);
            $status = 'Inactivated';
        }
        $notification = array(
            'message' => 'User ' . $status . ' Successfully',
            'alert-type' => 'success'
        );
        return redirect('/administration/users')->with($notification);
    }

    function remove_delete_useraccess($id, $value) {
        
        if ($value =='remove') {
            User::where('id', $id)->update(['isActive' => 0, 'isDelete' => 0]);
            $status = 'Removed';
        } else {
            User::where('id', $id)->delete();
            $status = 'Deleted';
        }

        $notification = array(
           'message' => 'User ' . $status . ' Successfully',
            'alert-type' => 'success'
        );
        return redirect('/administration/users')->with($notification);
    }

    /*
     * ***************************************Manage Single Users Data**************************************
     */

    public function profile() {
        $id = $this->userid;
        $data = [
            'userdetails' => User::leftJoin('roles', 'users.role', '=', 'roles.roleid')->where('id', $id)->first(),
        ];
        return view('administration.user.profile', $data);
    }

    /*
     * ***************************************Manage Single Users Data**************************************
     */

    public function remarks() {
        $data = [
            'remarks' => [],
        ];
        return view('remarks', $data);
    }

}
