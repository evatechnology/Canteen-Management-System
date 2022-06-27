<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
//use Carbon\Carbon;
use App\Models\Productstore;
use App\Models\Prostoreinfo;

class ProductController extends Controller {

    public $userid;
    public $filetime;
    public $username;

    public function __construct() {
        date_default_timezone_set("Asia/Dhaka");
        $this->filetime = date('g:i A');
        $this->middleware(function($request, $next) {
            $this->userid = Session::get('user_id');
            $this->username = Session::get('username');
            if ($this->userid == '') {
                return redirect('/');
            }
            $role = Session::get('role');
            if ($role == 6) {
                return redirect('salespanel/sale');
            }
            if ($role == 2) {
                return redirect('/');
            }
            return $next($request);
        });
    }

    //Add & View Products
    public function storeproducts($value) {
        $data = [
            'getsuppliers' => DB::table('suppliers')->get(),
            'getsingledata' => DB::table('singledatas')->get(),
            'getsingledata' => DB::table('singledatas')->get(),
            'getproductstore' => Productstore::leftJoin('suppliers', 'productstores.suppid', '=', 'suppliers.supid')->leftJoin('catproducts', 'productstores.productid', '=', 'catproducts.catproid')->orderBy('id', 'desc')->get(),
        ];
        if ($value == "add") {
            return view('products.add', $data);
        } elseif ($value == "manage") {
            $data['olprodqty'] = DB::table('productstores')->sum(DB::raw('olprodqty'));
            $data['saleproqty'] = DB::table('productstores')->sum(DB::raw('saleproqty'));
            $data['stock'] = DB::table('productstores')->sum(DB::raw('qunatity'));
            return view('products.index', $data);
        } elseif ($value == "print") {
            $data['getcatproducts'] = DB::table('productstores')->select('catname')->distinct()->get();
            return view('products.print', $data);
        } else {
            $prosuppliers = Prostoreinfo::leftJoin('suppliers', 'prostoreinfos.supplier', '=', 'suppliers.supid')
                    ->select("proindate", "supplier", "suppname")
                    ->selectRaw("SUM(totalqty) as total_qty")
                    ->selectRaw("SUM(paidamount) as total_paid")
                    ->selectRaw("SUM(dueamount) as total_due")
                    ->groupBy('proindate', 'supplier', 'suppname')
                    ->get();
            $data['prosuppliers'] = $prosuppliers;
            $data['nettotal'] =Prostoreinfo::sum(DB::raw('nettotal'));
            $data['paidamount'] =Prostoreinfo::sum(DB::raw('paidamount'));
            $data['dueamount'] =Prostoreinfo::where('dueamount', '!=', 0)->sum(DB::raw('dueamount'));
            return view('products.supplier', $data);
        }
    }

    public function productsbarcodeprint(Request $request) {
        $category = $request->get('value');
        if ($category == "all") {
            $catproducts = Productstore::leftJoin('catproducts', 'productstores.productid', '=', 'catproducts.catproid')->get();
        } else {
            $catproducts = Productstore::leftJoin('catproducts', 'productstores.productid', '=', 'catproducts.catproid')->where('catname', $category)->get();
        }
        $data['categoryname'] = $category;
        $data['getproductstore'] = $catproducts;
        return view('products.printpage', $data);
    }

//    public function get_products_barcode_print(Request $request) {
//        $category = $request->get('category');
//        $catproducts = Productstore::leftJoin('catproducts', 'productstores.productid', '=', 'catproducts.catproid')->where('catname', $category)->get();
//
//        foreach ($catproducts as $value) {
//            echo '<div class="col-lg-3 col-md-6 mb-3">';
//            echo '<span><b>' . $value->product . '</b></span><br>';
//            echo '<img src="' . url('/public/barcode/' . $value->filebarcode) . '" alt="user" class="img-fluid"><br>';
//            echo '<span><b>#' . $value->barcode . '</b></span><br>';
//            echo '<span><b>' . $value->sale . ' BDT</b></span><br>';
//            echo '</div>';
//        }
//    }

    public function addproducts(Request $request) {
        $date = date('Y-m-d');
        $supplier = $request->get('supplier');
        $category = $request->get('category');
        $qty = $request->get('qty');
        $type = $request->get('type');
        $data = [
            'prodate' => date('d-m-Y'),
            'posaccounts' => DB::table('posaccounts')->first(),
            'catproducts' => DB::table('catproducts')->orderBy('product', 'asc')->where('category', $category)->get(),
            'getsuppliers' => DB::table('suppliers')->where('supid', $supplier)->first(),
            'getsingledata' => DB::table('singledatas')->where('status', 'size')->get(),
            'getproduct' => Productstore::orderBy('id', 'desc')->where('protype', 'manual')->first(),
            'protype' => $type,
            'category' => $category,
            'suplyqty' => $qty,
            'getcatproducts' => DB::table('catproducts')->orderBy('catproid', 'desc')->where('category', $category)->get(),
        ];
        if ($type == "device") {
            return view('products.device', $data);
        } else {
            $data['getallproduct'] = DB::table('supporttables')->where('todate', $date)->where('inputdata', $supplier)->where('entryby', $this->userid)->sum(DB::raw('qunatity'));
            $data['getallproprice'] = DB::table('supporttables')->where('todate', $date)->where('inputdata', $supplier)->where('entryby', $this->userid)->sum(DB::raw('price'));
            return view('products.manual', $data);
        }
    }

    public function storesingleproduct(Request $request) {
        $suplyqty = $request->suplyqty;
        $stockqty = $request->stockqty;

        if ($stockqty <= $suplyqty) {
            $img = $request->image;
            $barcode = $request->barcode;
            $folderPath = './public/barcode/';
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = $barcode . '.jpg';
            $file = $folderPath . $fileName;
            file_put_contents($file, $image_base64);

            $prodata = [
                'prostoreid' => 0,
                'suppid' => $request->supplier,
                'catname' => $request->category,
                'protype' => $request->protype,
                'barcode' => $barcode,
                'filebarcode' => $fileName,
                'productid' => $request->productid,
                'prosize' => $request->prosize,
                'olprodqty' => $request->qunatity,
                'qunatity' => $request->qunatity,
                'price' => $request->price,
                'sale' => $request->sale,
                'subtotal' => $request->qunatity * $request->price,
                'proendate' => date('Y-m-d'),
                'proentime' => $this->filetime,
                'proenmonth' => date('F-Y'),
                'proaddby' => $this->userid,
                'prostatus' => 1,
                'proentry' => 0,
            ];
            DB::table('productstores')->insert($prodata);
            $supportdata = [
                'todate' => date('Y-m-d'),
                'inputdata' => $request->supplier,
                'qunatity' => $request->qunatity,
                'price' => $request->price,
                'entryby' => $this->userid,
            ];
            DB::table('supporttables')->insert($supportdata);
//            DB::table('catproducts')->where('catproid', $request->productid)->update(['psstatus' => 0]);
            $message = "Information Saved Successfully";
        } else {
            $message = "Quantity Should Be Less then Or Eqaul";
        }
        return $message;
    }

    public function updatesingleproduct(Request $request) {
        $date = date('Y-m-d');
        $stockpayment = $request->stockpayment;
        $supplier = $request->supplier;
        $category = $request->category;
        $paidamount = $request->paidamount;
        $prodata = [
            'proindate' => date('Y-m-d'),
            'supplier' => $supplier,
            'category' => $category,
            'totalqty' => $request->totalqty,
            'totalamount' => $request->totalamount,
            'prodiscount' => $request->prodiscount,
            'nettotal' => $request->nettotal,
            'paidamount' => $paidamount,
            'dueamount' => $request->dueamount,
            'paymethod' => $request->paymethod,
            'acnumber' => $request->acnumber,
            'prointime' => $this->filetime,
            'proinmonth' => date('F-Y'),
            'proinby' => $this->username,
        ];
        $getlastid = DB::table('prostoreinfos')->insertGetId($prodata);
        $updata = [
            'prostoreid' => $getlastid,
            'proentry' => 1
        ];
        DB::table('productstores')->where('proendate', $date)->where('proentry', 0)->update($updata);

        $acdata = [
            'payment' => $stockpayment + $paidamount
        ];
        DB::table('posaccounts')->where('id', 1)->update($acdata);
//        DB::table('catproducts')->where('category', $category)->update(['psstatus' => 1]);
        DB::table('supporttables')->truncate();

        $notification = array(
            'message' => 'Information Saved Successfully',
            'alert-type' => 'success'
        );
        return redirect('/storeproducts/add')->with($notification);
    }

    public function saveproinfo(Request $request) {
        $supplier = $request->supplier;
        $suplyqty = $request->suplyqty;
        $totalqty = $request->totalqty;

        $category = $request->category;
        $paidamount = $request->paidamount;
        $stokpayment = $request->stokpayment;
        $stockpay = $stokpayment + $paidamount;

        if ($totalqty <= $suplyqty) {
            $prodata = [
                'proindate' => date('Y-m-d'),
                'supplier' => $supplier,
                'category' => $category,
                'totalqty' => $request->totalqty,
                'totalamount' => $request->totalamount,
                'prodiscount' => $request->prodiscount,
                'nettotal' => $request->nettotal,
                'paidamount' => $paidamount,
                'dueamount' => $request->dueamount,
                'paymethod' => $request->paymethod,
                'acnumber' => $request->acnumber,
                'prointime' => $this->filetime,
                'proinmonth' => date('F-Y'),
                'proinby' => $this->username,
            ];
            $getlastid = DB::table('prostoreinfos')->insertGetId($prodata);
            
            $barcode = $request->barcode;
            $count = count((array) $barcode);
            for ($i = 0; $i < $count; $i++) {
                $data = [
                    'prostoreid' => $getlastid,
                    'suppid' => $supplier,
                    'catname' => $category,
                    'protype' => $request->protype,
                    'barcode' => $barcode[$i],
                    'filebarcode' => 'N/A',
                    'productid' => $request->productid[$i],
                    'prosize' => $request->prosize[$i],
                    'olprodqty' => $request->qunatity[$i],
                    'qunatity' => $request->qunatity[$i],
                    'price' => $request->price[$i],
                    'sale' => $request->sale[$i],
                    'subtotal' => $request->subtotal[$i],
                    'proentime' => $this->filetime,
                    'proendate' => date('Y-m-d'),
                    'proenmonth' => date('F-Y'),
                    'proaddby' => $this->userid,
                    'prostatus' => 1,
                    'proentry' => 1,
                ];
                DB::table('productstores')->insert($data);
            }
            DB::table('posaccounts')->where('id', 1)->update(['payment' => $stockpay]);
            $message = 'Information Saved Successfully';
            $type = 'success';
        } else {
            $message = 'Quantity Should Be Less then Or Eqaul';
            $type = 'alert';
        }

        $notification = array(
            'message' => $message,
            'alert-type' => $type
        );
        return redirect('/storeproducts/add')->with($notification);
    }

    //Edit Product
    public function editproduct($id, $id2) {
        $data = [
            'getsuppliers' => DB::table('suppliers')->get(),
            'getsingledata' => DB::table('singledatas')->orderBy('singledata', 'asc')->get(),
            'prostoreinfo' => Prostoreinfo::where('proinfoid', $id2)->first(),
            'storeproduct' => Productstore::leftJoin('catproducts', 'productstores.productid', '=', 'catproducts.catproid')->where('id', $id)->first(),
        ];
        return view('products.edit', $data);
    }

    public function deleteproduct($id, $value) {
        $getproduct = Productstore::where('id', $id)->first();
        $deleteqty = $getproduct->qunatity;
        $deleteprice = $getproduct->price;
        $probarcode = $getproduct->filebarcode;
        $productstore = Productstore::leftJoin('catproducts', 'productstores.productid', '=', 'catproducts.catproid')->where('id', $id)->first();
        $prostoreinfo = Prostoreinfo::where('proinfoid', $value)->first();
        $suplyqty = $prostoreinfo->totalqty;
        $totalamount = $prostoreinfo->totalamount;
        $prodiscount = $prostoreinfo->prodiscount;
        $paidamount = $prostoreinfo->paidamount;

        $reststockqty = $suplyqty - $deleteqty;
        $resttotalamount = $totalamount - ($deleteqty * $deleteprice);
        $restnettotal = $resttotalamount - $prodiscount;
        $restdueamount = $restnettotal - $paidamount;

        $data = [
            'totalqty' => $reststockqty,
            'totalamount' => $resttotalamount,
            'nettotal' => $restnettotal,
            'dueamount' => $restdueamount,
        ];
        Prostoreinfo::where('proinfoid', $value)->update($data);

        if ($probarcode != 'N/A') {
            $path = './public/barcode/' . $probarcode;
            unlink($path);
        }
        Productstore::where('id', $id)->delete();

        $proactdata = [
            'proinfoid' => $value,
            'prolistid' => $id,
            'proname' => $productstore->product,
            'prosize' => $productstore->prosize,
            'procate' => $productstore->category,
            'prostatus' => 'Delete',
            'prodataone' => $reststockqty + $deleteqty,
            'prodatatwo' => $deleteqty,
            'prodatathree' => $reststockqty,
            'proremarks' => 'Delete Products.',
            'proacttime' => $this->filetime,
            'proactdate' => date('Y-m-d'),
            'proactby' => $this->userid,
        ];
        DB::table('proactivities')->insert($proactdata);

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect('/storeproducts/manage')->with($notification);
    }

    /*
     * **************************************Manage Product Info*********************************************
     */

    public function addproquantities(Request $request) {
        $proinfoid = $request->proinfoid;
        $proid = $request->productid;
        $prostatus = $request->prostatus;
        $oldproname = $request->oldproname;
        $oldprocatename = $request->oldprocatename;

        $oldsupplier = $request->oldsupplier;
        $oldtotalqty = $request->oldtotalqty;
        $oldprice = $request->oldprice;
        $oldtotalamount = $request->oldtotalamount;
        $oldprodiscount = $request->oldprodiscount;
        $oldnettotal = $request->oldnettotal;
        $oldpaidamount = $request->oldpaidamount;
        $olddueamount = $request->olddueamount;

        $newqty = $request->newqty;
        $totalquantity = $request->totalquantity;
        $buyprice = $request->buyprice;
        $totalprice = $request->totalprice;
        $supplier = $request->supplier;
        $newdiscount = $request->newdiscount;
        $nettotal = $request->nettotal;
        $paidamount = $request->paidamount;
        $dueamount = $request->dueamount;
        $paymethod = $request->paymethod;
        $acnumber = $request->acnumber;
        $avgres = ($oldprice + $buyprice) / 2;
        $avgprice = \ceil($avgres);
        $addacdata = [
            'totalqty' => $oldtotalqty + $newqty,
            'totalamount' => $oldtotalamount + $totalprice,
            'prodiscount' => $oldprodiscount + $newdiscount,
            'nettotal' => $oldnettotal + $nettotal,
            'paidamount' => $oldpaidamount + $paidamount,
            'dueamount' => $olddueamount + $dueamount,
        ];

        DB::table('prostoreinfos')->where('proinfoid', $proinfoid)->update($addacdata);
        
        $prodata = [
            'qunatity' => $totalquantity,
            'price' => $avgprice,
        ];
        DB::table('productstores')->where('id', $proid)->update($prodata);
        

        // if ($oldsupplier == $supplier) {
        //     $oldsupid = $oldsupplier;
        //     $newsupid = $oldsupplier;
        // } else {
        //     $oldsupid = $oldsupplier;
        //     $newsupid = $supplier;
        // }
        // $updata = [
        //     'prolist' => $proid,
        //     'proaclist' => $proinfoid,
        //     'oldsupid' => $oldsupid,
        //     'oldproname' => $oldproname,
        //     'oldprocatename' => $oldprocatename,
        //     'oldprice' => $oldprice,
        //     'oldtotalqty' => $oldtotalqty,
        //     'oldnettotal' => $oldnettotal,
        //     'oldpaidamount' => $oldpaidamount,
        //     'olddueamount' => $olddueamount,
        //     'newsupid' => $newsupid,
        //     'newquantity' => $newqty,
        //     'newbuyprice' => $buyprice,
        //     'newnettotal' => $nettotal,
        //     'newpaidamount' => $paidamount,
        //     'newdueamount' => $dueamount,
        //     'newpaymethod' => $paymethod,
        //     'newacnumber' => $acnumber,
        //     'newuptime' => $this->filetime,
        //     'newupdate' => date('Y-m-d'),
        //     'newupmonth' => date('F-Y'),
        //     'newupby' => $this->userid,
        //     'upstatus' => $prostatus,
        // ];
        // DB::table('pronewoldlists')->insert($updata);

        $proactdata = [
            'proinfoid' => $proinfoid,
            'prolistid' => $proid,
            'proname' => $oldproname,
            'prosize' => $request->productsize,
            'procate' => $oldprocatename,
            'prostatus' => 'Update',
            'prodataone' => $totalquantity - $newqty,
            'prodatatwo' => $newqty,
            'prodatathree' => $totalquantity,
            'proremarks' => 'Update New Quantity',
            'proacttime' => $this->filetime,
            'proactdate' => date('Y-m-d'),
            'proactby' => $this->userid,
        ];
        DB::table('proactivities')->insert($proactdata);

        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('/storeproducts/manage')->with($notification);
    }

    public function reduceproqtities(Request $request) {
        $proinfoid = $request->proinfoid;
        $proid = $request->productid;

        $deleteqty = $request->reduceqty;
        $deleteprice = $request->oldprice;
        $oldqunatity = $request->oldqunatity;

        $suplyqty = $request->oldtotalqty;
        $totalamount = $request->oldtotalamount;
        $prodiscount = $request->oldprodiscount;
        $paidamount = $request->oldpaidamount;

        $reststockqty = $suplyqty - $deleteqty;
        $resttotalamount = $totalamount - ($deleteqty * $deleteprice);
        $restnettotal = $resttotalamount - $prodiscount;
        $restdueamount = $restnettotal - $paidamount;

        $prodata = [
            'qunatity' => $oldqunatity - $deleteqty,
        ];
        DB::table('productstores')->where('id', $proid)->update($prodata);

        $data = [
            'totalqty' => $reststockqty,
            'totalamount' => $resttotalamount,
            'nettotal' => $restnettotal,
            'dueamount' => $restdueamount,
        ];
        Prostoreinfo::where('proinfoid', $proinfoid)->update($data);

        $proactdata = [
            'proinfoid' => $proinfoid,
            'prolistid' => $proid,
            'proname' => $request->productname,
            'prosize' => $request->productsize,
            'procate' => $request->oldpaidamount,
            'prostatus' => 'Return',
            'prodataone' => $oldqunatity,
            'prodatatwo' => $deleteqty,
            'prodatathree' => $oldqunatity - $deleteqty,
            'proremarks' => 'Return Quantity',
            'proacttime' => $this->filetime,
            'proactdate' => date('Y-m-d'),
            'proactby' => $this->userid,
        ];
        DB::table('proactivities')->insert($proactdata);

        $notification = array(
            'message' => 'Product Returned Successfully',
            'alert-type' => 'success'
        );
        return redirect('/storeproducts/manage')->with($notification);
    }

    public function updatesaleprice(Request $request) {
        $proinfoid = $request->proinfoid;
        $proid = $request->productid;
        $oldprosale = $request->oldprosale;
        $upsaleprice = $request->upsaleprice;

        if ($upsaleprice == $oldprosale) {
            $salestatus = 'Equal';
        } elseif ($upsaleprice > $oldprosale) {
            $salestatus = 'Increase';
        } else {
            $salestatus = 'Decrease';
        }

        $prodata = [
            'sale' => $request->upsaleprice,
        ];
        DB::table('productstores')->where('id', $proid)->update($prodata);

        $proactdata = [
            'proinfoid' => $proinfoid,
            'prolistid' => $proid,
            'proname' => $request->productname,
            'prosize' => $request->productsize,
            'procate' => $request->productcat,
            'prostatus' =>'Upsale',
            'prodataone' => $oldprosale,
            'prodatatwo' => $upsaleprice,
            'prodatathree' => $upsaleprice,
            'proremarks' => 'Update Sale Price.',
            'proacttime' => $this->filetime,
            'proactdate' => date('Y-m-d'),
            'proactby' => $this->userid,
        ];
        DB::table('proactivities')->insert($proactdata);

        $notification = array(
            'message' => 'Sale Price Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('/storeproducts/manage')->with($notification);
    }

    public function updatewastepro(Request $request) {
        $proinfoid = $request->proinfoid;
        $proid = $request->productid;
        $oldtotalqty = $request->oldtotalqty;
        $stockqty = $request->stockqty;
        $wastepros = $request->wastepros;

        $resttotalqty = $oldtotalqty - $wastepros;
        $restqunatity = $stockqty - $wastepros;

        $proacdata = [
            'totalqty' => $resttotalqty,
        ];
        Prostoreinfo::where('proinfoid', $proinfoid)->update($proacdata);
        $prodata = [
            'qunatity' => $restqunatity,
        ];
        DB::table('productstores')->where('id', $proid)->update($prodata);

        $proactdata = [
            'proinfoid' => $proinfoid,
            'prolistid' => $proid,
            'proname' => $request->productname,
            'prosize' => $request->productsize,
            'procate' => $request->productcat,
            'prostatus' => 'Waste',
            'prodataone' => $stockqty,
            'prodatatwo' => $wastepros,
            'prodatathree' => $restqunatity,
            'proremarks' => 'Waste Product',
            'proacttime' => $this->filetime,
            'proactdate' => date('Y-m-d'),
            'proactby' => $this->userid,
        ];
        DB::table('proactivities')->insert($proactdata);

        $notification = array(
            'message' => 'Waste Products Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect('/storeproducts/manage')->with($notification);
    }

    /*
     * **************************************Supplier Product List*********************************************
     */

    public function supplierproducts($id) {
        $data = [
            'storeproducts' => Productstore::leftJoin('catproducts', 'productstores.productid', '=', 'catproducts.catproid')->where('suppid', $id)->get(),
        ];
        return view('products.supplierpros', $data);
    }

    public function product_zerro_notification() {
        $results = Productstore::where('qunatity', 0)->count();
        return response()->json($results);
    }

    public function viewzerroproducts() {
        $data = [
            'getproductstore' => Productstore::leftJoin('catproducts', 'productstores.productid', '=', 'catproducts.catproid')->where('qunatity', 0)->get(),
        ];
        return view('products.zerropros', $data);
    }

    public function updatequantities($id, $id2) {
        $data = [
            'getsuppliers' => DB::table('suppliers')->get(),
            'getsingledata' => DB::table('singledatas')->orderBy('singledata', 'asc')->get(),
            'prostoreinfo' => Prostoreinfo::where('proinfoid', $id2)->first(),
            'storeproduct' => Productstore::leftJoin('catproducts', 'productstores.productid', '=', 'catproducts.catproid')->where('id', $id)->first(),
        ];
        return view('products.updateqty', $data);
    }

    /*
     * **************************************Supplier Product List*********************************************
     */
}
