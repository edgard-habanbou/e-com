<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\TodoController;
use App\Models\ShoppingCart;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::controller(TodoController::class)->group(function () {
    Route::get('todos', 'index');
    Route::post('todo', 'store');
    Route::get('todo/{id}', 'show');
    Route::put('todo/{id}', 'update');
    Route::delete('todo/{id}', 'destroy');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'get_products');
    Route::post('/products', 'add_product');
    Route::post('/products/update/{id}', 'update_product');
    Route::delete('/products/{id}', 'delete_product');
});

Route::controller(ShoppingCartController::class)->group(function () {
    Route::get('/cart', 'get_shopping_cart');
    Route::post('/cart', 'add_shopping_cart');
    Route::delete('/cart', 'delete_shopping_cart');
});
