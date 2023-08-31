<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\login;
use App\Http\Controllers\product_crud;
use App\Http\Controllers\stats;
use App\Http\Controllers\filter;

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
Route::get('/products', [product_crud::class, 'index']);
Route::get('/product/edit/{id}', [product_crud::class, 'update_product']);
Route::delete('/delete/{id}', [product_crud::class, 'delete_product']);


/* STATISTICS AND NOTIFICATIONS*/
Route::get('/stats', [stats::class, 'total_prod']);
Route::get('/expiration', [stats::class, 'expiration']);
Route::get('/stocks', [stats::class, 'stocks']);
Route::get('/stock_total', [stats::class, 'stock_total']);
Route::get('/crit_stocks', [stats::class, 'critical_stocks']);


/* SEARCH AND FILTER */
Route::get('/search/{data}', [filter::class, 'search']);
