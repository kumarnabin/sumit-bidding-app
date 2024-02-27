<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(["middleware" => "auth"], function () {
    Route::resources([
        "role" => \App\Http\Controllers\RoleController::class,
        "items" => \App\Http\Controllers\ItemController::class,
        "categories" => \App\Http\Controllers\CategoryController::class,
        "auctions" => \App\Http\Controllers\AuctionController::class,
        "feedbacks" => \App\Http\Controllers\FeedbackController::class,
        "messages" => \App\Http\Controllers\MessageController::class,
    ]);
});
