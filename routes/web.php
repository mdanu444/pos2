<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchesesController;
use App\Http\Controllers\ReceiptsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\UserController;
use App\Http\Requests\SalesInvocieRequest;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Group;
use App\Models\Product;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function(){
    return redirect()->route('login');
});

Route::middleware('AuthCheck')->group(function(){
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'confirmLogin'])->name('confirm.login');
});


Route::middleware('auth')->group(function(){

Route::resource('/users', UserController::class);
Route::get('users-mpdf', function () {
    $data = User::all();
    $pdf = PDF::loadView('users.pdfview', ['collection' => $data]);
    return $pdf->download('invoice.pdf');
})->name('users-pdf');

//  01743499226, 01755336987
Route::get('users/{user}/sales', [SalesController::class, 'index'])->name('users.sales');
Route::post('users/{user}/sales', [SalesController::class, 'store'])->name('users.sales.store');
Route::delete('users/{user}/sales/{invoice}', [SalesController::class, 'destory'])->name('users.sales.delete');
Route::get('users/{user}/invocies/{invoice}', [SalesController::class, 'invoice'])->name('users.sales.invoice');
Route::post('users/{user}/invocies/{invoice}/item', [SalesController::class, 'StorItem'])->name('users.sales.invoice.item');

Route::delete('users/{user}/invocies/{invoice}', [SalesController::class, 'itemDestory'])->name('sale.item.destory');











Route::get('users/{user}/receipts', [ReceiptsController::class, 'index'])->name('users.receipts');
Route::post('users/{user}/receipts/{invoice?}', [ReceiptsController::class, 'store'])->name('users.receipts.store');
Route::delete('users/{user}/destroy/{receipt}', [ReceiptsController::class, 'destroy'])->name('users.receipts.destroy');


Route::get('users/{user}/purchases', [PurchesesController::class, 'index'])->name('users.purchases');
Route::post('users/{user}/purchases', [PurchesesController::class, 'store'])->name('users.purchases.store');


Route::get('users/{user}/payments', [PaymentController::class, 'index'])->name('users.payments');
Route::post('users/{user}/payments', [PaymentController::class, 'store'])->name('users.payments.store');
Route::delete('users/{user}/payments/{payment}', [PaymentController::class, 'destroy'])->name('users.payments.destroy');


    Route::get('logout', function(){
        session()->put('message', '');
        Auth::logout();
        return redirect(route('login'));
    })->name('logout');
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');
    Route::resource('/groups', GroupController::class);
    Route::get('groups-mpdf', function () {
        $data = Group::all();
        $pdf = PDF::loadView('Groups.pdfview', ['collection' => $data]);
        return $pdf->download('invoice.pdf');
    })->name('group-pdf');


    Route::resource('/admins', AdminController::class);
    Route::get('admins-mpdf', function () {
        $data = Admin::all();
        $pdf = PDF::loadView('admins.pdfview', ['collection' => $data]);
        return $pdf->download('invoice.pdf');
    })->name('admins-pdf');

    Route::resource('/products', ProductController::class);
    Route::get('products-mpdf', function () {
        $data = Product::all();
        $pdf = PDF::loadView('products.pdfview', ['collection' => $data]);
        return $pdf->download('invoice.pdf');
    })->name('products-pdf');

    Route::resource('/categories', CategoryController::class);
    Route::get('categories-mpdf', function () {
        $data = Category::all();
        $pdf = PDF::loadView('categories.pdfview', ['collection' => $data]);
        return $pdf->download('invoice.pdf');
    })->name('categories-pdf');

});
