<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\KratmeisterController;
use App\Http\Controllers\OverigeproductController;
use App\Http\Controllers\BeerbrandController;
use App\Http\Controllers\ShoppingcartController;
use Illuminate\Support\Facades\Mail;
use \App\Mail\OrderBevestiging;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/doehet', function(){
    return '<h1>doe het kut ding</h1>';
});

Route::get('/symlink', function(){
    $targetFolder = $_SERVER['DOCUMENT_ROOT'].'/setup/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
    symlink($targetFolder, $linkFolder);
    return 'success';
});

//Clear Cache facade value:
Route::get('/clear', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCodea = Artisan::call('route:clear');
    $exitCodeb = Artisan::call('config:clear');
    $exitCodec = Artisan::call('view:clear');

    return '<h1>Cache facade value cleared</h1>';
});


Route::get('clearsession', function(Request $request){
    $request->session()->flush();
    return '<h1>clear session data</h1>';
});

Route::get('migrate', function(){
    Artisan::call('migrate:refresh --seed', []);
    return '<h1>Symlink created</h1>';
});

Route::get('symlink', function(){
    Artisan::call('storage:link', []);
    return '<h1>Symlink created</h1>';
});

//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

// Route::get('/mailtest',function(){

//     Mail::to("matthijnwur@gmail.com")->send(new OrderBevestiging(15));
//     echo "dit doet het het matthijnwur@gmail.com";

// } );


Route::get('contact', function(){
    return view('contact/index');
  })->name('contact');



//test views
// Route::get('/testcarousel', 'TestController@testcarousel') ->name('testcarousel');


//test mollie
// Route::get('/preparepayment', 'OrderController@preparePayment') ->name('preparePayment');
Route::get('/paymentsucces', 'OrderController@paymentSuccess') ->name('paymentSucces');
Route::post('/webhookmollie', 'OrderController@handleWebhookNotification')->name('webhookmollie');

/// download image

Route::get('get/{filename}/{username}', 'FileController@getFile')->name('getfile');



Route::get('/admin', 'AdminController@index') ->name('adminIndex')->middleware('auth');
Route::get('/adminBooks', 'AdminController@adminBooks') ->name('adminBooks')->middleware('auth');
Route::get('/adminKlanten', 'AdminController@adminKlanten') ->name('adminKlanten')->middleware('auth');
Route::get('/adminOrders', 'AdminController@adminOrders') ->name('adminOrders')->middleware('auth');
Route::get('/adminOverigeProducten', 'AdminController@adminOverigeProducten') ->name('adminOverigeProducten')->middleware('auth');
Route::get('/adminKratmeister', 'AdminController@adminKratmeister') ->name('adminKratmeister')->middleware('auth');
Route::get('/adminBeerbrands', 'AdminController@adminBeerbrands') ->name('adminBeerbrands')->middleware('auth');

Route::post('/adminOrdersFilter', 'AdminController@adminOrdersFilter') ->name('adminOrdersFilter')->middleware('auth');

/// add to cart routes
Route::post('/addkratmeister','ShoppingcartController@createKratmeisterSession')->name('addkratmeister');

Route::post('/addbook','ShoppingcartController@createBookSession')->name('addbook');
Route::get('/shoppingcart', 'ShoppingcartController@index') ->name('shoppingcart');
Route::post('/updatecart','ShoppingcartController@update')->name('updatecart');

// add order routes

Route::get('/order', 'OrderController@orderForm') ->name('orderform');
Route::post('/storeorder', 'OrderController@store') ->name('storeOrder');
Route::get('/order/{id}', 'OrderController@show')->name('showOrder')->middleware('auth');
Route::post('/updateOrder/{id}', 'OrderController@update')->name('updateOrder')->middleware('auth');
Route::get('/filerOrders/{id}', 'AdminController@adminFilterOrders')->name('filterOrders')->middleware('auth');
Route::get('/searchOrders', 'AdminController@adminSearchOrders')->name('searchOrders')->middleware('auth');



///admin routes

// delete after testing the commented out routes.
Route::prefix('/adminBeerbrands') ->group(function(){
    // Route::get('/add',[BeerbrandController::class,'add'])->name('addBeerbrand');;

    Route::get('/create',[BeerbrandController::class,'create'])->name('createBeerbrand');;
    // Route::patch('/{id}',[BeerbrandController::class,'edit'])->name('editBeerbrand');

    Route::post('/store',[BeerbrandController::class,'store'])->name('storeBeerbrand');
    // Route::put('/{id}',[BeerbrandController::class,'update'])->name('updateBeerbrand');
    // Route::delete('/{id}',[BeerbrandController::class,'destroy'])->name('deleteBeerbrand');

}

);



Route::prefix('/adminBooks') ->group(function(){
    Route::get('/create',[BookController::class,'create'])->name('createBook');;
    Route::patch('/{id}',[BookController::class,'edit'])->name('editBook');

    Route::post('/store',[BookController::class,'store'])->name('storeBook');
    Route::put('/{id}',[BookController::class,'update'])->name('updateBook');
    Route::delete('/{id}',[BookController::class,'destroy'])->name('deleteBook');

}

);


Route::prefix('/adminKratmeister') ->group(function(){
    Route::get('/create',[KratmeisterController::class,'create'])->name('createKratmeister');;
    Route::patch('/{id}',[KratmeisterController::class,'edit'])->name('editKratmeister');

    Route::post('/store',[KratmeisterController::class,'store'])->name('storeKratmeister');
    Route::put('/{id}',[KratmeisterController::class,'update'])->name('updateKratmeister');
    Route::delete('/{id}',[KratmeisterController::class,'destroy'])->name('deleteKratmeister');

}

);



Route::prefix('/adminOverigeProducts') ->group(function(){
    Route::get('/create',[OverigeproductController::class,'create'])->name('createOverigeProduct');;
    Route::patch('/{id}',[OverigeproductController::class,'edit'])->name('editOverigeProduct');

    Route::post('/store',[OverigeproductController::class,'store'])->name('storeOverigeProduct');
    Route::put('/{id}',[OverigeproductController::class,'update'])->name('updateOverigeProduct');
    Route::delete('/{id}',[OverigeproductController::class,'destroy'])->name('deleteOverigeProduct');

}

);


//////////////////// user routes////////////
Route::get('/', 'BookController@index')->name('indexBook');
Route::get('/books/{id}', 'BookController@show')->name('showBook');


Route::get('/kratmeister', 'KratmeisterController@index')->name('indexKratmeister');
Route::get('/kratmeister/{id}', 'KratmeisterController@show')->name('showKratmeister');


Route::get('/overigeProducten', 'OverigeproductController@index')->name('indexOverigProduct');
Route::get('/overigeProducten/{id}', 'OverigeproductController@show')->name('showOverigeProduct');




Auth::routes(['reset' => false, 'verify' => false, 'register' => false]);





