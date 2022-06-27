<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SupplierExport;
use App\Models\Prostoreinfo;
use App\Models\Productstore;

class ReportController extends Controller {

    public $userid;

    public function __construct() {
        $this->middleware(function($request, $next) {
            $this->userid = Session::get('user_id');
            if ($this->userid == '') {
                return redirect('/');
            }
            $role = Session::get('role');
            if ($role == 6) {
                return redirect('salespanel/sale');
            }
            return $next($request);
        });
    }

    public function reports($value) {
        $result = strtolower($value);
        $prosuppliers = Prostoreinfo::leftJoin('suppliers', 'prostoreinfos.supplier', '=', 'suppliers.supid')
                ->select("supplier", "suppname")
                ->groupBy('supplier', 'suppname')
                ->get();
        $salemembers = DB::table('saleproinvoices')->leftJoin('members', 'saleproinvoices.memberidno', '=', 'members.memberidno')
                ->select("saleproinvoices.memberidno", "memberrank", "membername")
                ->groupBy('saleproinvoices.memberidno', 'memberrank', 'membername')
                ->get();
        $data = [
            'values' => ucfirst($value),
            'getsuppliers' => $prosuppliers,
            'salemembers' => $salemembers,
            'getmonths' => DB::table('months')->get(),
            'getproactivities' => DB::table('proactivities')->orderBy('proactid','desc')->get(),
        ];
        if ($result == 'products') {
            return view('reports.products.repopage', $data);
        } elseif ($result == 'sales') {
            return view('reports.sales.repopage', $data);
        } elseif ($result == 'collections') {
            return view('reports.collections.repopage', $data);
        } elseif ($result == 'expenses') {
            return view('reports.expenses.repopage', $data);
        } elseif ($result == 'activities') {
            return view('reports.activities', $data);
        } else {
            $notification = array(
                'message' => 'Result Not Found !',
                'alert-type' => 'warning'
            );
            return redirect('/dashboard')->with($notification);
        }
    }

    public function exportsuppliers() {
        $filename = date('jni') . rand(1, 100);
        $file = 'Suppliers-' . $filename . '.xlsx';
        return Excel::download(new SupplierExport, $file);
    }

    //Search Product Entry
    public function supplierrepo(Request $request) {
        $supplier = $request->get('supplier');
        $fromdate = $request->get('fdate');
        $todate = $request->get('tdate');

        $month = $request->get('month') . '-' . $request->get('year');

        if (!empty($fromdate) && !empty($todate)) {
            $fromtarik = date('Y-m-d', strtotime($fromdate));
            $totarik = date('Y-m-d', strtotime($todate));
            $status = 'yesdate';
        } else {
            $status = 'nodate';
        }

        if ($supplier == 'all') {
            if ($status == 'yesdate') {
                $getproductstore = Productstore::leftJoin('suppliers', 'productstores.suppid', '=', 'suppliers.supid')->leftJoin('catproducts', 'productstores.productid', '=', 'catproducts.catproid')->
                        when($fromtarik, function($query, $fromtarik) {
                            return $query->whereDate('proendate', '>=', $fromtarik);
                        })
                        ->when($totarik, function($query, $totarik) {
                            return $query->whereDate('proendate', '<=', $totarik);
                        })
                        ->get();
                $getproductacinfo = Prostoreinfo::leftJoin('suppliers', 'prostoreinfos.supplier', '=', 'suppliers.supid')->
                        when($fromtarik, function($query, $fromtarik) {
                            return $query->whereDate('proindate', '>=', $fromtarik);
                        })
                        ->when($totarik, function($query, $totarik) {
                            return $query->whereDate('proindate', '<=', $totarik);
                        })
                        ->get();
            } else {
                $getproductstore = Productstore::leftJoin('suppliers', 'productstores.suppid', '=', 'suppliers.supid')
                        ->leftJoin('catproducts', 'productstores.productid', '=', 'catproducts.catproid')
                        ->where('proenmonth', $month)
                        ->get();
                $getproductacinfo = Prostoreinfo::leftJoin('suppliers', 'prostoreinfos.supplier', '=', 'suppliers.supid')->
                        where('proinmonth', $month)
                        ->get();
            }
        } else {
            if ($status == 'yesdate') {
                $getproductstore = Productstore::leftJoin('suppliers', 'productstores.suppid', '=', 'suppliers.supid')
                        ->leftJoin('catproducts', 'productstores.productid', '=', 'catproducts.catproid')->
                        when($supplier, function($query, $supplier) {
                            return $query->where('productstores.suppid', $supplier);
                        })
                        ->when($fromtarik, function($query, $fromtarik) {
                            return $query->whereDate('proendate', '>=', $fromtarik);
                        })
                        ->when($totarik, function($query, $totarik) {
                            return $query->whereDate('proendate', '<=', $totarik);
                        })
                        ->get();
                $getproductacinfo = Prostoreinfo::leftJoin('suppliers', 'prostoreinfos.supplier', '=', 'suppliers.supid')->
                        when($supplier, function($query, $supplier) {
                            return $query->where('prostoreinfos.supplier', $supplier);
                        })
                        ->when($fromtarik, function($query, $fromtarik) {
                            return $query->whereDate('proindate', '>=', $fromtarik);
                        })
                        ->when($totarik, function($query, $totarik) {
                            return $query->whereDate('proindate', '<=', $totarik);
                        })
                        ->get();
            } else {
                $getproductstore = Productstore::leftJoin('suppliers', 'productstores.suppid', '=', 'suppliers.supid')
                        ->leftJoin('catproducts', 'productstores.productid', '=', 'catproducts.catproid')->
                        when($supplier, function($query, $supplier) {
                            return $query->where('productstores.suppid', 'like', '%' . $supplier . '%');
                        })
                        ->when($month, function($query, $month) {
                            return $query->where('proenmonth', $month);
                        })
                        ->get();
                $getproductacinfo = Prostoreinfo::leftJoin('suppliers', 'prostoreinfos.supplier', '=', 'suppliers.supid')->
                        when($supplier, function($query, $supplier) {
                            return $query->where('prostoreinfos.supplier', 'like', '%' . $supplier . '%');
                        })
                        ->when($month, function($query, $month) {
                            return $query->where('proinmonth', $month);
                        })
                        ->get();
            }
        }
        $data = [
            'getproductstore' => $getproductstore,
            'getproductacinfo' => $getproductacinfo,
        ];
        return view('reports.products.all', $data);
    }

    //Search Sale Products
    public function salerepo(Request $request) {
        $member = $request->get('member');
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

        if ($member == 'all') {
            if ($status == 'yesdate') {
                $saleproducts = DB::table('saleproboxs')->leftJoin('members', 'saleproboxs.member', '=', 'members.memberidno')->
                        when($fromtarik, function($query, $fromtarik) {
                            return $query->whereDate('saledate', '>=', $fromtarik);
                        })
                        ->when($totarik, function($query, $totarik) {
                            return $query->whereDate('saledate', '<=', $totarik);
                        })
                        ->get();

                $saleproinvoices = DB::table('saleproinvoices')->leftJoin('members', 'saleproinvoices.memberidno', '=', 'members.memberidno')->
                        when($fromtarik, function($query, $fromtarik) {
                            return $query->whereDate('invodate', '>=', $fromtarik);
                        })
                        ->when($totarik, function($query, $totarik) {
                            return $query->whereDate('invodate', '<=', $totarik);
                        })
                        ->get();
            } else {
                $saleproducts = DB::table('saleproboxs')->leftJoin('members', 'saleproboxs.member', '=', 'members.memberidno')
                        ->where('salemonth', $month)
                        ->get();
                $saleproinvoices = DB::table('saleproinvoices')->leftJoin('members', 'saleproinvoices.memberidno', '=', 'members.memberidno')->
                        where('invomonth', $month)
                        ->get();
            }
        } else {
            if ($status == 'yesdate') {
                $saleproducts = DB::table('saleproboxs')->leftJoin('members', 'saleproboxs.member', '=', 'members.memberidno')->
                        when($member, function($query, $member) {
                            return $query->where('member', $member);
                        })
                        ->when($fromtarik, function($query, $fromtarik) {
                            return $query->whereDate('saledate', '>=', $fromtarik);
                        })
                        ->when($totarik, function($query, $totarik) {
                            return $query->whereDate('saledate', '<=', $totarik);
                        })
                        ->get();
                $saleproinvoices = DB::table('saleproinvoices')->leftJoin('members', 'saleproinvoices.memberidno', '=', 'members.memberidno')->
                        when($member, function($query, $member) {
                            return $query->where('saleproinvoices.memberidno', $member);
                        })
                        ->when($fromtarik, function($query, $fromtarik) {
                            return $query->whereDate('invodate', '>=', $fromtarik);
                        })
                        ->when($totarik, function($query, $totarik) {
                            return $query->whereDate('invodate', '<=', $totarik);
                        })
                        ->get();
            } else {
                $saleproducts = DB::table('saleproboxs')->leftJoin('members', 'saleproboxs.member', '=', 'members.memberidno')->
                        when($member, function($query, $member) {
                            return $query->where('saleproboxs.member', 'like', '%' . $member . '%');
                        })
                        ->when($month, function($query, $month) {
                            return $query->where('salemonth', $month);
                        })
                        ->get();
                $saleproinvoices = DB::table('saleproinvoices')->leftJoin('members', 'saleproinvoices.memberidno', '=', 'members.memberidno')->
                        when($member, function($query, $member) {
                            return $query->where('saleproinvoices.memberidno', 'like', '%' . $member . '%');
                        })
                        ->when($month, function($query, $month) {
                            return $query->where('invomonth', $month);
                        })
                        ->get();
            }
        }
        $data = [
            'saleproducts' => $saleproducts,
            'saleproinvoices' => $saleproinvoices,
        ];
        return view('reports.sales.all', $data);
    }

    public function collectionrepo(Request $request) {
        $type = $request->get('type');
        $fromdate = $request->get('fdate');
        $todate = $request->get('tdate');

        $fromtarik = date('Y-m-d', strtotime($fromdate));
        $totarik = date('Y-m-d', strtotime($todate));

        if ($type == "paid") {
            $collections = DB::table('saleproinvoices')->leftJoin('members', 'saleproinvoices.memberidno', '=', 'members.memberidno')->
                    when($fromtarik, function($query, $fromtarik) {
                        return $query->whereDate('invodate', '>=', $fromtarik);
                    })
                    ->when($totarik, function($query, $totarik) {
                        return $query->whereDate('invodate', '<=', $totarik);
                    })
                    ->get();
        } else {
            $duecollections = DB::table('saleproinvoices')->leftJoin('members', 'saleproinvoices.memberidno', '=', 'members.memberidno')->
                    when($fromtarik, function($query, $fromtarik) {
                        return $query->whereDate('invodate', '>=', $fromtarik);
                    })
                    ->when($totarik, function($query, $totarik) {
                        return $query->whereDate('invodate', '<=', $totarik);
                    })
                    ->get();
        }
        if ($type == "paid") {
            $data = [
                'collections' => $collections,
            ];
            return view('reports.collections.paid', $data);
        } else {
            $data = [
                'duecollections' => $duecollections,
            ];
            return view('reports.collections.due', $data);
        }
    }

//Search Expenses Reports
    public function expensesrepo(Request $request) {
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

        if ($status == 'yesdate') {
            $expensesrepo = DB::table('expenses')
                    ->whereDate('expmakedte', '>=', $fromtarik)
                    ->whereDate('expmakedte', '<=', $totarik)
                    ->get();
        } else {
            $expensesrepo = DB::table('expenses')
                    ->where('expmonth', $month)
                    ->get();
        }

        $data = [
            'expensesdata' => $expensesrepo,
        ];
        return view('reports.expenses.index', $data);
    }

}
