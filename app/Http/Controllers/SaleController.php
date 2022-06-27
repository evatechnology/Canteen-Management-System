<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
//use Carbon\Carbon;
use App\Models\Productstore;

class SaleController extends Controller {

    public $userid;
    public $filetime;

    public function __construct() {
        date_default_timezone_set("Asia/Dhaka");
        $this->filetime = date('g:i A');
        $this->middleware(function ($request, $next) {
            $this->userid = Session::get('user_id');
            if ($this->userid == '') {
                return redirect('/');
            }
            $role = Session::get('role');
            if ($role == 5) {
                return redirect('/');
            }
            return $next($request);
        });
    }

    //Edit Product
    public function salespanel($value) {
        $date = date('Y-m-d');
        $data = [
            'posaccounts' => DB::table('posaccounts')->first(),
            'getsuppliers' => DB::table('suppliers')->get(),
            'getmembers' => DB::table('members')->orderBy('memberidno', 'desc')->get(),
            'productstores' => DB::table('productstores')->get(),
            'saleproinvoices' => DB::table('saleproinvoices')->leftJoin('members', 'saleproinvoices.memberidno', '=', 'members.memberidno')->orderBy('id', 'desc')->where('invodate', $date)->where('entryby', $this->userid)->get(),
        ];
        if ($value == "sale") {
            return view('sales.sale', $data);
        } elseif ($value == "alter") {
            return view('sales.altersale', $data);
        } else {
            return view('sales.todaysale', $data);
        }
    }

    public function ajaxsearch(Request $request) {
        $movies = [];
        if ($request->has('q')) {
            $search = $request->q;
            $movies = Productstore::select("id", "barcode")
                    ->where('barcode', 'LIKE', "%$search%")
                    ->get();
        }
        return response()->json($movies);
    }

    public function ajaxcustomersearch(Request $request) {
        $movies = [];

        if ($request->has('q')) {
            $search = $request->q;
            $movies = DB::table('members')->select("memid", "memberidno")
                    ->where('memberidno', 'LIKE', "%$search%")
                    ->get();
        }
        return response()->json($movies);
    }

    public function getmemberinformationbyid(Request $request) {
        $id = $request->get('id');
        $result = DB::table('members')->where('memid', $id)->first();
        return response()->json([
                    'customeridno' => $result->memberidno,
        ]);
    }

    //Get Product Information
    public function get_product_information(Request $request) {
        $value = $request->get('value');
        $result = Productstore::leftJoin('catproducts', 'productstores.productid', '=', 'catproducts.catproid')->where('barcode', $value)->where('qunatity', '!=', 0)->first();
        if ($result) {
            return response()->json([
                        'proid' => $result->id,
                        'proname' => $result->product,
                        'prosize' => $result->prosize,
                        'qunatity' => $result->qunatity,
                        'prosale' => $result->sale,
            ]);
        }
    }

    //Get Product Information
    public function get_product_information_byid(Request $request) {
        $id = $request->get('id');
        $result = Productstore::leftJoin('catproducts', 'productstores.productid', '=', 'catproducts.catproid')->where('id', $id)->where('prostatus', 1)->first();
        if ($result) {
            return response()->json([
                        'proid' => $result->id,
                        'barcode' => $result->barcode,
                        'proname' => $result->product,
                        'prosize' => $result->prosize,
                        'qunatity' => $result->qunatity,
                        'prosale' => $result->sale,
            ]);
        }
    }

    //Sale Products
    public function savesaleproducts(Request $request) {
        $getstockqty = $request->stockqty;
        $countqty = count($getstockqty);
        $quantity = $request->quantity;

        for ($i = 0; $i < $countqty; $i++) {
            if ($quantity[$i] > $getstockqty[$i]) {
                $notification = array(
                    'message' => 'Quantities Should Be Less then Or Eqaul To Stock Qty !',
                    'alert-type' => 'error'
                );
                return redirect('/salespanel/alter')->with($notification);
            }
        }

        $payment = $request->payment;
        $saleinvoice = date('jny') . rand(10, 100);
        $data = array(
            'saleinvoice' => $saleinvoice,
            'tosaleqty' => $request->tosaleqty,
            'gtotal' => $request->gtotal,
            'discount' => $request->discount,
            'nettotal' => $request->nettotal,
            'payment' => $payment,
            'dueamount' => $request->dueamount,
            'inwords' => $request->amountwords,
            'memberidno' => $request->memberidno,
            'entryby' => $this->userid,
            'entrytime' => $this->filetime,
            'invodate' => date('Y-m-d'),
            'invomonth' => date('F-Y'),
        );
        $lastinvoid = DB::table('saleproinvoices')->insertGetId($data);
        //Insert Product List
        $productid = $request->productid;
        $stockqty = $request->stockqty;
        $temp = count($productid);
        for ($i = 0; $i < $temp; $i++) {

            $restofqty = $stockqty[$i] - $request->quantity[$i];
            $prodata = array(
                'saleinvid' => $lastinvoid,
                'saleproid' => $productid[$i],
                'saleproname' => $request->proname[$i],
                'saleprosize' => $request->prosize[$i],
                'saleprice' => $request->price[$i],
                'salequantity' => $request->quantity[$i],
                'salesubtotal' => $request->subtotal[$i],
                'member' => $request->memberidno,
                'salestatus' => 1,
                'saletime' => $this->filetime,
                'saledate' => date('Y-m-d'),
                'salemonth' => date('F-Y'),
                'saleby' => $this->userid,
            );
            DB::table('saleproboxs')->insert($prodata);
            DB::table('productstores')->where('id', $productid[$i])->update(['qunatity' => $restofqty, 'saleproqty' => $request->quantity[$i]],);
        }

        if ($payment != 0) {
            $coldata = [
                'invoiceno' => $saleinvoice,
                'member' => $request->memberidno,
                'totalamount' => $request->nettotal,
                'lastpaiddue' => $request->nettotal,
                'collection' => $payment,
                'restdue' => $request->dueamount,
                'colltime' => $this->filetime,
                'colldate' => date('Y-m-d'),
                'collmonth' => date('F-Y'),
                'collby' => Session::get('username'),
            ];
            DB::table('collections')->insert($coldata);
        }
        $received = $payment + $request->received;
        DB::table('posaccounts')->where('id', 1)->update(['received' => $received]);

        $notification = array(
            'message' => 'Sale Information Saved Successfully',
            'alert-type' => 'success'
        );
        if ($request->redirect == "alter") {
            return redirect('/salespanel/alter')->with($notification);
        } else {
            return redirect('/salespanel/sale')->with($notification);
        }
    }

    //
    public function saleinvoicechanges($id, $value) {
        $data = [
            'posaccounts' => DB::table('posaccounts')->first(),
            'saleproinvoice' => DB::table('saleproinvoices')->leftJoin('members', 'saleproinvoices.memberidno', '=', 'members.memberidno')->where('saleproinvoices.id', $id)->first(),
            'saleproboxs' => DB::table('saleproboxs')->leftJoin('productstores', 'saleproboxs.saleproid', '=', 'productstores.id')->orderBy('saleboxid', 'desc')->where('saleinvid', $id)->get(),
        ];
        if ($value == "invoice") {
            return view('sales.invoice', $data);
        } else {
            return view('sales.edit', $data);
        }
    }

    //Sale Qunatities
    public function sale_single_information_byid(Request $request) {
        $id = $request->get('id');
        $results = DB::table('saleproboxs')->leftJoin('productstores', 'saleproboxs.saleproid', '=', 'productstores.id')->where('saleboxid', $id)->first();
        return response()->json($results);
    }

    //Salse Return
    public function returnsale(Request $request) {
        $saleinvoid = $request->saleinvoid;
        $saleboxid = $request->saleboxid;
        $saleproid = $request->saleproid;
        $proqunatity = $request->proqunatity;

        $tosaleqty = $request->tosaleqty;
        $gtotal = $request->gtotal;
        $discount = $request->discount;
        $payment = $request->payment;
        $salequantity = $request->salequantity;
        $saleprice = $request->saleprice;
        $reqty = $request->reqty;

        #Sale Product Calculation
        $restsaleqty = $salequantity - $reqty;
        $getsaleprice = $saleprice * $reqty;
        $restsaleprice = $saleprice * $restsaleqty;

        #Sale Accounts Calculation
        $resttosaleqty = $tosaleqty - $reqty;
        $restgtotal = $gtotal - $getsaleprice;
        $restnettotal = $restgtotal - $discount;
        $restpayment = $payment - $getsaleprice;

        //Update Sale Products
        $saleprodata = [
            'salequantity' => $restsaleqty,
            'salesubtotal' => $restsaleprice
        ];
        DB::table('saleproboxs')->where('saleboxid', $saleboxid)->update($saleprodata);
        //Update Sale Invoice
        $saleacdata = [
            'tosaleqty' => $resttosaleqty,
            'gtotal' => $restgtotal,
            'nettotal' => $restnettotal,
            'payment' => $restpayment,
            'dueamount' => $restnettotal - $restpayment,
        ];
        DB::table('saleproinvoices')->where('id', $saleinvoid)->update($saleacdata);
        //Update Previous Products
        $prevprodata = [
            'qunatity' => $proqunatity + $reqty,
        ];
        DB::table('productstores')->where('id', $saleproid)->update($prevprodata);

        $received = $request->received - $getsaleprice;
        DB::table('posaccounts')->where('id', 1)->update(['received' => $received]);
        $saleactdata = [
            'proname' => $request->saleproname,
            'prosize' => $request->saleprosize,
            'totalqty' => $tosaleqty,
            'returnqty' => $reqty,
            'restqty' => $resttosaleqty,
            'remarks' => 'Return Sale Products.',
            'rettime' => $this->filetime,
            'retdate' => date('Y-m-d'),
            'retfrom' => $request->getmember,
            'returnby' => $this->userid,
        ];
        DB::table('saleactivities')->insert($saleactdata);

        $notification = array(
            'message' => 'Sale Product Returned Successfully',
            'alert-type' => 'success'
        );
        return redirect('/salespanel/today')->with($notification);
    }

    //get_sales_notification
    public function get_sales_notification() {
        $date = date('Y-m-d');
        $results = DB::table('saleproboxs')->where('saledate', $date)->where('salestatus', 1)->count();
        return response()->json($results);
    }

    //View Sales Product
    public function viewtodayssales() {
        $date = date('Y-m-d');
        DB::table('saleproboxs')->where('saledate', $date)->update(['salestatus' => 0]);

        $data = [
            'saleproboxs' => DB::table('saleproboxs')->where('saledate', $date)->get(),
        ];
        return view('sales.salenoti', $data);
    }

    //Manage Sale Product
    public function saleproducts($value) {
        $month = date('F-Y');
        $data = [
            'saleproboxs' => DB::table('saleproboxs')->leftJoin('members', 'saleproboxs.member', '=', 'members.memberidno')->orderBy('saleboxid', 'desc')->where('salemonth', $month)->get(),
            'saleproinvoices' => DB::table('saleproinvoices')->leftJoin('members', 'saleproinvoices.memberidno', '=', 'members.memberidno')->orderBy('id', 'desc')->where('invomonth', $month)->get(),
            'saleactivities' => DB::table('saleactivities')->leftJoin('members', 'saleactivities.retfrom', '=', 'members.memberidno')->leftJoin('users', 'saleactivities.returnby', '=', 'users.id')->orderBy('saleactid', 'desc')->get(),
        ];
        $data['nettotal'] = DB::table('saleproinvoices')->sum(DB::raw('nettotal'));
        $data['paidamount'] = DB::table('saleproinvoices')->sum(DB::raw('payment'));
        $data['dueamount'] = DB::table('saleproinvoices')->where('dueamount', '!=', 0)->sum(DB::raw('dueamount'));

        if ($value == "manage") {
            return view('sales.index', $data);
        } elseif ($value == "sale") {
            return view('sales.salepage', $data);
        } else {
            return view('sales.returnpage', $data);
        }
    }

//    //Manage Sale Product
//    public function managesalepanel($value, $id) {
//        $data = [
//            'saleproinvoice' => DB::table('saleproinvoices')->leftJoin('members', 'saleproinvoices.memberidno', '=', 'members.memberidno')->where('saleproinvoices.id', $id)->first(),
//            'saleproboxs' => DB::table('saleproboxs')->leftJoin('productstores', 'saleproboxs.saleproid', '=', 'productstores.id')->orderBy('saleboxid', 'desc')->where('saleinvid', $id)->get(),
//        ];
//        if ($value == 'products') {
//            return view('sales.products', $data);
//        } elseif ($value == 'edit') {
//            return view('sales.edit', $data);
//        } else {
//            echo 'Coming Soon';
//        }
//    }
    //Manage Sale Product
}
