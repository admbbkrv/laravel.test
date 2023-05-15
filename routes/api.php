<?php


use App\Http\Controllers\Api\PostController;
use App\Models\Currency;
use Illuminate\Support\Facades\Route;


Route::as('api.')->group(function () {
    Route::resource('post', PostController::class);
    Route::get('currency', function (){
        return Currency::first();
    });
});
