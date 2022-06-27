<?php

use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
 */
//
//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\LoginController::class, 'index']);
Route::post('/useraccess', [App\Http\Controllers\LoginController::class, 'useraccess'])->name('useraccess');


Route::group(['middleware' => ['superauth']], function() {
    /*
      |------------------------------------Dashboard Route--------------------------------------
     */
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::get('/remarks', [App\Http\Controllers\AdminController::class, 'remarks']);
    /*
      |------------------------------------Suppliers Routes--------------------------------------
     */
    Route::get('/suppliers', [App\Http\Controllers\AdminController::class, 'suppliers']);
    Route::get('/suppliers/{id}', [App\Http\Controllers\AdminController::class, 'supplierpros']);
    Route::post('/savesuppliers', [App\Http\Controllers\AdminController::class, 'savesuppliers'])->name('savesuppliers');
    Route::get('/check_duplicate_supplier', [App\Http\Controllers\AdminController::class, 'check_duplicate_supplier']);
    Route::get('/gete_supplier_info', [App\Http\Controllers\AdminController::class, 'gete_supplier_info']);
    Route::post('/updatesuppliers', [App\Http\Controllers\AdminController::class, 'updatesuppliers'])->name('updatesuppliers');
    Route::get('/deletesupplierdata/{id}', [App\Http\Controllers\AdminController::class, 'deletesupplierdata']);
    /*
      |------------------------------------Members Routes--------------------------------------
     */
    Route::get('/storeproducts/{value}', [App\Http\Controllers\ProductController::class, 'storeproducts']);
    Route::get('/addproducts/', [App\Http\Controllers\ProductController::class, 'addproducts']);
    Route::post('/storesingleproduct/', [App\Http\Controllers\ProductController::class, 'storesingleproduct'])->name('storesingleproduct');
    Route::post('/savestoreproduct/', [App\Http\Controllers\ProductController::class, 'savestoreproduct'])->name('savestoreproduct');
    Route::post('/saveproinfo/', [App\Http\Controllers\ProductController::class, 'saveproinfo'])->name('saveproinfo');
    Route::get('/editproduct/{id}/{value}', [App\Http\Controllers\ProductController::class, 'editproduct']);
    Route::post('/updatesingleproduct/', [App\Http\Controllers\ProductController::class, 'updatesingleproduct'])->name('updatesingleproduct');
    Route::get('/deleteproduct/{id}/{value}', [App\Http\Controllers\ProductController::class, 'deleteproduct']);
    Route::get('/supplierproducts/{id}', [App\Http\Controllers\ProductController::class, 'supplierproducts']);
    Route::get('/productsbarcodeprint', [App\Http\Controllers\ProductController::class, 'productsbarcodeprint']);
    Route::post('/addproquantities', [App\Http\Controllers\ProductController::class, 'addproquantities'])->name('addproquantities');
    Route::post('/reduceproqtities', [App\Http\Controllers\ProductController::class, 'reduceproqtities'])->name('reduceproqtities');
    Route::post('/updatesaleprice', [App\Http\Controllers\ProductController::class, 'updatesaleprice'])->name('updatesaleprice');
    Route::post('/updatewastepro', [App\Http\Controllers\ProductController::class, 'updatewastepro'])->name('updatewastepro');
    Route::get('/product_zerro_notification', [App\Http\Controllers\ProductController::class, 'product_zerro_notification']);
    Route::get('/viewzerroproducts', [App\Http\Controllers\ProductController::class, 'viewzerroproducts']);
    Route::get('/updatequantities/{id}/{value}', [App\Http\Controllers\ProductController::class, 'updatequantities']);

    /*
      |------------------------------------Members Routes--------------------------------------
     */
    Route::get('/accounts/{value}', [App\Http\Controllers\AccountController::class, 'accounts']);
    Route::post('/dailyexpenses', [App\Http\Controllers\AccountController::class, 'dailyexpenses'])->name('dailyexpenses');
    Route::get('/deleteexpensedata/{id}', [App\Http\Controllers\AccountController::class, 'deleteexpensedata']);
    Route::get('/expense', [App\Http\Controllers\AccountController::class, 'expense'])->name('expense');
    Route::get('/dueinvoiceinfo', [App\Http\Controllers\AccountController::class, 'dueinvoiceinfo']);
    Route::post('/paydueinvoice', [App\Http\Controllers\AccountController::class, 'paydueinvoice'])->name('paydueinvoice');

    /*
      |------------------------------------Members Routes--------------------------------------
     */
    Route::get('/members', [App\Http\Controllers\AdminController::class, 'members']);
    Route::get('/searchmember', [App\Http\Controllers\AdminController::class, 'searchmember'])->name('searchmember');;
    Route::post('/savemembers', [App\Http\Controllers\AdminController::class, 'savemembers'])->name('savemembers');
    Route::get('/check_duplicate_member', [App\Http\Controllers\AdminController::class, 'check_duplicate_member']);
    Route::get('/gete_member_info', [App\Http\Controllers\AdminController::class, 'gete_member_info']);
    Route::post('/updatemember', [App\Http\Controllers\AdminController::class, 'updatemember'])->name('updatemember');
    Route::get('/deletememberdata/{id}', [App\Http\Controllers\AdminController::class, 'deletememberdata']);
    Route::get('/deletememberdata/{id}', [App\Http\Controllers\AdminController::class, 'deletememberdata']);
    Route::get('/membersales/{value}', [App\Http\Controllers\AdminController::class, 'membersales']);
    Route::get('/memberprosales', [App\Http\Controllers\AdminController::class, 'memberprosales'])->name('memberprosales');
    Route::get('/memcollection/{value}', [App\Http\Controllers\AdminController::class, 'dueamount']);
   
    Route::get('/membercollection', [App\Http\Controllers\AdminController::class, 'membercollection'])->name('membercollection');
    /*
      |------------------------------------Presetdata Routes--------------------------------------
     */
    Route::get('/administration/{value}', [App\Http\Controllers\AdminController::class, 'administration']);
    Route::get('/get_category_information', [App\Http\Controllers\AdminController::class, 'get_category_information']);
    Route::post('/saveprodata', [App\Http\Controllers\AdminController::class, 'saveprodata'])->name('saveprodata');
    Route::post('/savepresetdata', [App\Http\Controllers\AdminController::class, 'savepresetdata'])->name('savepresetdata');
    Route::get('/viewpresetdata/{value}', [App\Http\Controllers\AdminController::class, 'viewpresetdata']);
    Route::get('/gete_presetdata_info', [App\Http\Controllers\AdminController::class, 'gete_presetdata_info']);
    Route::post('/updatepresetdata', [App\Http\Controllers\AdminController::class, 'updatepresetdata'])->name('updatepresetdata');
    Route::get('/delete_presetdatas/{id}/{value}', [App\Http\Controllers\AdminController::class, 'delete_presetdatas']);
    /*
      |------------------------------------User Route--------------------------------------
     */
    Route::get('/check_duplicate_user', [App\Http\Controllers\AdminController::class, 'check_duplicate_user']);
    Route::post('/save_newuser_details', [App\Http\Controllers\AdminController::class, 'save_newuser_details'])->name('save_newuser_details');
    Route::post('/update_user_details', [App\Http\Controllers\AdminController::class, 'update_user_details'])->name('update_user_details');
    Route::get('/remove_delete_useraccess/{id}/{value}', [App\Http\Controllers\AdminController::class, 'remove_delete_useraccess']);
    Route::get('/gete_user_info/', [App\Http\Controllers\AdminController::class, 'gete_user_info']);
    Route::get('/update_useraccess/{id}/{value}', [App\Http\Controllers\AdminController::class, 'update_useraccess']);

    /*
      |------------------------------------Sales Panel--------------------------------------
     */
    Route::get('/salespanel/{value}', [App\Http\Controllers\SaleController::class, 'salespanel']);
    Route::get('/ajaxsearch', [App\Http\Controllers\SaleController::class, 'ajaxsearch']);
    Route::get('/ajaxcustomersearch', [App\Http\Controllers\SaleController::class, 'ajaxcustomersearch']);
    Route::get('/getmemberinformationbyid', [App\Http\Controllers\SaleController::class, 'getmemberinformationbyid']);
    Route::get('/get_product_information', [App\Http\Controllers\SaleController::class, 'get_product_information']);
    Route::get('/get_product_information_byid', [App\Http\Controllers\SaleController::class, 'get_product_information_byid']);
    Route::post('/saleproducts', [App\Http\Controllers\SaleController::class, 'savesaleproducts'])->name('saleproducts');
    Route::get('/get_sales_notification', [App\Http\Controllers\SaleController::class, 'get_sales_notification']);
    Route::get('/viewtodayssales', [App\Http\Controllers\SaleController::class, 'viewtodayssales']);
    Route::get('/saleproducts/{value}', [App\Http\Controllers\SaleController::class, 'saleproducts']);
//    Route::get('/managesales/{value}/{id}', [App\Http\Controllers\SaleController::class, 'managesalepanel']);
    Route::get('/saleinvoice/{id}/{value}', [App\Http\Controllers\SaleController::class, 'saleinvoicechanges']);
    Route::post('returnsale', [App\Http\Controllers\SaleController::class, 'returnsale'])->name('returnsale');
    Route::get('sale_single_information_byid', [App\Http\Controllers\SaleController::class, 'sale_single_information_byid']);

    /*
      |------------------------------------Exxcel Route--------------------------------------
     */
    Route::get('/reports/{value}', [App\Http\Controllers\ReportController::class, 'reports']);
    Route::get('/exportsuppliers', [App\Http\Controllers\ReportController::class, 'exportsuppliers']);
    Route::get('/supplierrepo', [App\Http\Controllers\ReportController::class, 'supplierrepo'])->name('supplierrepo');
    Route::get('/salerepo', [App\Http\Controllers\ReportController::class, 'salerepo'])->name('salerepo');
    Route::get('/collectionrepo', [App\Http\Controllers\ReportController::class, 'collectionrepo'])->name('collectionrepo');
    Route::get('/expensesrepo', [App\Http\Controllers\ReportController::class, 'expensesrepo'])->name('expensesrepo');

    /*
      |------------------------------------Profile Route--------------------------------------
     */
    Route::get('/profile', [App\Http\Controllers\ExtraController::class, 'profile']);
    Route::get('/geteuserinfo', [App\Http\Controllers\ExtraController::class, 'geteuserinfo']);
    Route::post('/upuserinfo', [App\Http\Controllers\ExtraController::class, 'update_user_details'])->name('upuserinfo');


    Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'logout']);
});
Route::group(['middleware' => ['revalidate']], function() {
    Route::get('/', function () {
        if (Auth::check()) {
            if (Auth::user()->role == 6) {
                return redirect('/salespanel/sale');
            } else {
                return redirect('/dashboard');
            }
        }
        return view('login');
    });
});

Route::get('configclear', function() {
    Artisan::call('config:clear');
    $notification = array(
        'message' => 'Config is cleared',
        'alert-type' => 'success'
    );
    return redirect('/')->with($notification);
});
Route::get('cacheclear', function() {
    Artisan::call('cache:clear');
    $notification = array(
        'message' => 'Cache is cleared',
        'alert-type' => 'success'
    );
    return redirect('/')->with($notification);
});
Route::get('viewclear', function() {
    Artisan::call('view:clear');
    $notification = array(
        'message' => 'View is cleared',
        'alert-type' => 'success'
    );
    return redirect('/')->with($notification);
});

