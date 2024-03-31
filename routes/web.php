<?php
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/quotes', [QuoteController::class,'index']);
Route::post('/create', function(){
    dd("Welcome");
});

