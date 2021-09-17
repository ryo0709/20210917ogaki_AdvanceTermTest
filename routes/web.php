<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', [ContactController::class, 'index']);
Route::get('/confirm', [ContactController::class, 'confirm']);
Route::post('/post', [ContactController::class, 'post']);
Route::get('/thanks', function () {
    return view('thanks');
});
Route::get('/management', [ContactController::class, 'search']);
Route::post('/delete', [ContactController::class, 'delete'])->name('delete');