<?php


use App\Http\Controllers\User\DonateController;
use App\Http\Controllers\User\PostController;
use Illuminate\Support\Facades\Route;


Route::prefix('user')->as('user.')->group(function (){
    Route::redirect('/', '/user/posts')->name('index');
    Route::resource('posts', PostController::class);
    Route::get('donates', DonateController::class)->name('donates');
});

