<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Laravel\Jetstream\Rules\Role;
use App\Http\Controllers\WebpayPlusController;
use App\Http\Controllers\PaypalController;

Route::get('/',[PostController::class, 'index'])->name('posts.index');

Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');

Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');

//Webpay
Route::get('webpay', [WebpayPlusController::class, 'webpay_inicio'])->name('webpay_inicio');
Route::get('webpay/pagar', [WebpayPlusController::class, 'webpay_pagar'])->name('webpay_pagar');
Route::get('webpay/respuesta', [WebpayPlusController::class, 'webpay_respuesta'])->name('webpay_respuesta');

//Paypal API Blog
Route::get('paypal', [PaypalController::class, 'paypal_inicio'])->name('paypal_inicio');
Route::get('paypal/respuesta', [PaypalController::class, 'paypal_respuesta'])->name('paypal_respuesta');
Route::get('paypal/cancelado', [PaypalController::class, 'paypal_cancelado'])->name('paypal_cancelado');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Ejercicios Livewire
Route::get('home',[PostController::class, 'home'])->name('posts.home');