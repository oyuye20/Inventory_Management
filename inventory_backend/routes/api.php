<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login;
use App\Http\Controllers\product_crud;
use App\Http\Controllers\stats;
use App\Http\Controllers\filter;
use App\Http\Controllers\inventory1;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::middleware('auth:sanctum')->group(function(){

    Route::get('/user', function (Request $request){
        return $request->user();
    });

    Route::post('/logout_user', [login::class, 'logout']);
    
});




/* LOGIN */
Route::post('/auth_login', [login::class, 'login']);
Route::post('/auth_register', [login::class, 'register']);


/* PRODUCT CRUD */
Route::post('/add_product', [product_crud::class, 'add_product']);

Route::put('/update_product/{id}', [product_crud::class, 'action_update_product']);
Route::get('/products', [product_crud::class, 'index']);
Route::get('/product/edit/{id}', [product_crud::class, 'index_update_product']);
Route::put('/delete/{id}', [product_crud::class, 'delete_product']);


Route::get('/sample/{id}', [product_crud::class, 'show1']);

Route::post('/checkout', [product_crud::class, 'checkout']);




/* INVENTORY */
Route::get('/inventory', [inventory1::class, 'inventory_index']);
Route::get('/index/category', [inventory1::class, 'index_category']);

Route::get('/select/category', [inventory1::class, 'select_category']);
Route::get('/select/product/info', [inventory1::class, 'select_product_info']);


Route::get('/category/edit/{id}', [inventory1::class, 'get_update_cat']);



Route::post('/category', [inventory1::class, 'create_category']);
Route::post('/inventory/add', [inventory1::class, 'inventory_add']);



Route::put('/category/update/{id}', [inventory1::class, 'update_category']);
Route::put('/category/archive/{id}', [inventory1::class, 'delete_category']);
Route::put('/delete/category/{id}', [inventory1::class, 'delete_category']);



/* STATISTICS AND NOTIFICATIONS*/
Route::get('/stats', [stats::class, 'total_prod']);
Route::get('/expiration', [stats::class, 'expiration']);
Route::get('/stocks', [stats::class, 'stocks']);
Route::get('/stock_total', [stats::class, 'stock_total']);
Route::get('/crit_stocks', [stats::class, 'critical_stocks']);

Route::get('/exp_count', [stats::class, 'expired_count']);
Route::get('/sales', [stats::class, 'total_sales']);
Route::get('/sold', [stats::class, 'sold_items']);


/* SEARCH AND FILTER */
Route::get('/search/{data}', [filter::class, 'search']);



Route::get('/relation', [product_crud::class, 'sample']);