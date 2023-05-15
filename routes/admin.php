<?php


use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->as('admin.')->middleware(['auth', 'active', 'admin'])
    ->group(function () {
        Route::redirect('/', '/admin/post')
            ->name('index');
        Route::resource('post', PostController::class);
    });
