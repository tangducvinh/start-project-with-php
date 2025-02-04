<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FoodsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/product',  [
    ProductController::class,
    'index',
]);

Route::get('/products/{id}/{productName}', [
    ProductController::class,
    'detail'
])->where([
    "id" => '[0-9]+',
    'productName' => '[a-z]+'
]);

Route::get('/', [
    PagesController::class,
    'index'
]);

Route::get('/about', [
    PagesController::class,
    'about'
]);

Route::get('/blog', [PagesController::class, 'blog']);

Route::get("/posts", [PostsController::class, 'index']);

Route::get("/foods", [FoodsController::class, 'index']);

Route::put('/foods/{id}', [FoodsController::class, 'update']);

Route::get('foods/{id}', [FoodsController::class, 'show']);

Route::get('/foods/create', [FoodsController::class, 'create']);

Route::post('/foods', [FoodsController::class, 'store']);

Route::get('/foods/{id}/edit', [FoodsController::class, 'edit']);

Route::delete('/foods/{id}', [FoodsController::class, 'delete']);
