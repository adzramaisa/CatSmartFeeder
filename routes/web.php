<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodsController;

Route::get('/', function () {
    return view('layouts');
});

Route::get('/monitors', [FoodsController::class, 'index']);

Route::get('/managements', function () {
    return view('pages.management');
});

Route::get('/controls', function (){
    return response()->json([
        'status' => true,
        'message' => "success turn on"
    ]);
})->name('lamp.control');