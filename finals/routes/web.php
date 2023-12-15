<?php

// routes/web.php
// routes/web.php

use App\Http\Controllers\CrudDashboardController;
use App\Http\Controllers\LoginDashboardController;
use App\Http\Controllers\MainDashboardController;
use App\Http\Controllers\ImageHistoryController;

Route::get('/crud-dashboard', [CrudDashboardController::class, 'showForm'])->name('crud-dashboard.showForm');
Route::post('/upload-image', [CrudDashboardController::class, 'uploadImage']);
Route::get('/login', [LoginDashboardController::class, 'index'])->name('login.dashboard');
Route::post('/login', [LoginDashboardController::class, 'login'])->name('login');

Route::get('/main-dashboard', [MainDashboardController::class, 'index'])->name('main-dashboard.index');

// Corrected route definition for update-name
Route::post('/update-name', [CrudDashboardController::class, 'updateName'])->name('crud-dashboard.updateName');

Route::get('/image-history', [ImageHistoryController::class, 'index'])->name('image-history.index');
Route::get('/image-history/{id}', [ImageHistoryController::class, 'showImage'])->name('image-history.showImage');
Route::delete('/image-history/{id}', [ImageHistoryController::class, 'destroy'])->name('image-history.destroy');
