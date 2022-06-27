<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Productstore;

class AccountController extends Controller {

    public $userid;
    public $filetime;

    public function __construct() {
        date_default_timezone_set("Asia/Dhaka");
        $this->filetime = date('g:i A');
        $this->middleware(function($request, $next) {
            $this->userid = Session::get('user_id');
            $role = Session::get('role');
            if ($role == 6) {
                return redirect('salespanel/sale');
            }
            if ($role == 5) {
                return redirect('/');
            }
            if ($this->userid == '') {
                return redirect('/');
            }
            return $next($request);
        });
    }

    //Edit Product
    public function accounts($value) {
        $date = date('Y-m-d');
        $month = date('F-Y');
        $data = [
            'posaccounts' => DB::table('posaccounts')->where('id', 1)->first(),
            'nettotal' => DB::table('saleproinvoices')->sum(DB::raw('nettotal')),
            'paidamount' => DB::table('saleproinvoices')->sum(DB::raw('payment')),
            'dueamount' => DB::table('saleproinvoices')->sum(DB::raw('dueamount')),
            'saleproinvoices' => DB::table('saleproinvoices')->leftJoin('members', 'saleproinvoices.memberidno', '=', 'members.memberidno')->orderBy('id', 'desc')->where('invomonth', $month)->get(),
            'getcollections' => DB::table('collections')->leftJoin('members', 'collections.member', '=', 'members.memberidno')->orderBy('collid', 'desc')->get(),
            'getexpenses' => DB::table('expenses')->orderBy('id', 'desc')->get(),
            'expensesamount' => DB::table('expenses')->sum(DB::raw('expamount')),
            'getexptypeby' => DB::table('expenses')->select('expby', 'exptype')->groupBy(['expby', 'exptype'])->get(),
        ];
        if ($value == "sale") {
            return view('accounts.index', $data);
        } elseif ($value == "due") {
            return view('accounts.alldue', $data);
        } else {
            return view('accounts.expense', $data);
        }
    }

    //dueinvoiceinfo
    public function dueinvoiceinfo(Request $request) {
        $id = $request->get('id');
        $result = DB::table('saleproinvoices')->leftJoin('members', 'saleproinvoices.memberidno', '=', 'members.memberidno')->where('id', $id)->first();
        return response()->json($result);
    }

    public function paydueinvoice(Request $request) {
        $dataid = $request->dataid;
        $paidamount = $request->paidamount;
        $olddueamount = $request->olddueamount;
        $duepay = $request->duepay;

        $totalpaid = $paidamount + $duepay;
        $totaldiue = $olddueamount - $duepay;

        $data = [
            'invoiceno' => $request->saleinvoice,
            'member' => $request->memberidno,
            'totalamount' => $request->totalamount,
            'lastpaiddue' => $olddueamount,
            'collection' => $duepay,
            'restdue' => $totaldiue,
            'colltime' => $this->filetime,
            'colldate' => date('Y-m-d'),
            'collmonth' => date('F-Y'),
            'collby' => Session::get('username'),
        ];

        DB::table('collections')->insert($data);

        $upsaledata = [
            'payment' => $totalpaid,
            'dueamount' => $totaldiue,
        ];

        DB::table('saleproinvoices')->where('id', $dataid)->update($upsaledata);

        $received = $duepay + $request->received;
        DB::table('posaccounts')->where('id', 1)->update(['received' => $received]);

        $notification = array(
            'message' => 'Due Paid Successfully',
            'alert-type' => 'success'
        );
        return redirect('/accounts/sale')->with($notification);
    }

    //Save Daily Expenses
    public function dailyexpenses(Request $request) {
        $expdate = $request->expdate;
        $expby = ucwords($request->expby);

        $exptype = $request->exptype;
        $temp = count($exptype);
        for ($i = 0; $i < $temp; $i++) {
            $data = array(
                'expdate' => $expdate,
                'expby' => $expby,
                'exptype' => $exptype[$i],
                'expamount' => $request->expamount[$i],
                'expremarks' => $request->expremarks[$i],
                'exptime' => $this->filetime,
                'expmakedte' => date('Y-m-d'),
                'expmonth' => date('F-Y'),
            );
            DB::table('expenses')->insert($data);
        }
        $notification = array(
            'message' => 'Expense Information Saved Successfully',
            'alert-type' => 'success'
        );
        return redirect('/accounts/expense')->with($notification);
    }

    //Delete Daily Expenses
    public function deleteexpensedata($id) {
        DB::table('expenses')->where('id', $id)->delete();
        $notification = array(
            'message' => 'Expense Information Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect('/accounts/expense')->with($notification);
    }

    //Search expense
    public function expense(Request $request) {
        $fromdate = $request->get('fdate');
        $todate = $request->get('tdate');

        if (!empty($fromdate) && !empty($todate)) {
            $fromtarik = date('Y-m-d', strtotime($fromdate));
            $totarik = date('Y-m-d', strtotime($todate));
            $status = 'yesdate';
        } else {
            $status = 'nodate';
        }
        $exptype = $request->get('type');
        $expby = $request->get('by');

        if ($status == 'yesdate') {
            $expensesdata = DB::table('expenses')->
                    when($expby, function($query, $expby) {
                        return $query->where('expby', $expby);
                    })
                    ->when($exptype, function($query, $exptype) {
                        return $query->where('exptype', $exptype);
                    })
                    ->when($fromtarik, function($query, $fromtarik) {
                        return $query->whereDate('expmakedte', '>=', $fromtarik);
                    })
                    ->when($totarik, function($query, $totarik) {
                        return $query->whereDate('expmakedte', '<=', $totarik);
                    })
                    ->get();
        } else {
            $expensesdata = DB::table('expenses')->
                    when($expby, function($query, $expby) {
                        return $query->where('expby', $expby);
                    })
                    ->when($exptype, function($query, $exptype) {
                        return $query->where('exptype', $exptype);
                    })
                    ->get();
        }

        $data = [
            'expensesdata' => $expensesdata,
        ];
        return view('accounts.expreport', $data);
    }

}
