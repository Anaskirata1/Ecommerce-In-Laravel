<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class , 'index']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('redirect', [HomeController::class , 'redirect']);

Route::get('view_category', [AdminController::class , 'view_category']);

Route::post('add_category', [AdminController::class , 'add_category']);

Route::get('delete_category/{id}', [AdminController::class , 'delete_category']);

Route::get('update_category/{id}', [AdminController::class , 'update_category']);

Route::post('update_category_confirm/{id}', [AdminController::class , 'update_category_confirm']);

Route::get('view_product', [AdminController::class , 'view_product']);

Route::post('add_product', [AdminController::class , 'add_product']);

Route::get('show_product', [AdminController::class , 'show_product']);

Route::get('delete_product/{id}', [AdminController::class , 'delete_product']);

Route::get('update_product/{id}', [AdminController::class , 'update_product']);

Route::get('order', [AdminController::class , 'order']);

Route::post('update_product_confirm/{id}', [AdminController::class , 'update_product_confirm']);

Route::get('product_details/{id}', [HomeController::class , 'product_details']);

Route::post('add_cart/{id}', [HomeController::class , 'add_cart']);

Route::get('show_cart', [HomeController::class , 'show_cart']);

Route::get('remove_cart/{id}', [HomeController::class , 'remove_cart']);

Route::get('cash_order', [HomeController::class , 'cash_order']);

Route::get('stripe/{totalprice}', [HomeController::class , 'stripe']);

Route::post('stripe/{totalprice}', [HomeController::class ,'stripePost'])->name('stripe.post');

Route::get('delivered/{id}', [AdminController::class ,'delivered']);

Route::get('print_pdf', [AdminController::class ,'print_pdf']);

Route::get('send_email/{id}', [AdminController::class ,'send_email']);

Route::post('send_user_email/{id}', [AdminController::class ,'send_user_email']);

Route::get('search', [AdminController::class ,'searchdata']);

Route::get('show_order', [HomeController::class ,'show_order']);

Route::get('cancle_order/{id}', [HomeController::class ,'cancle_order']);

Route::post('add_comment', [HomeController::class ,'add_comment']);

Route::post('add_reply', [HomeController::class ,'add_reply']);

Route::get('product_search', [HomeController::class ,'product_search']);

Route::get('search_product', [HomeController::class ,'search_product']);

Route::get('products', [HomeController::class ,'product']);

Route::get('about', [HomeController::class ,'about']);

Route::get('blog', [HomeController::class ,'blog']);

Route::get('contact', [HomeController::class ,'contact']);

