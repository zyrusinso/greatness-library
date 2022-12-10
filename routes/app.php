<?php

use Illuminate\Support\Facades\Route;

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::redirect('/', '/dashboard', 301);
    Route::redirect('/home', '/dashboard', 301);

    Route::resource('/visitor-logs', App\Http\Controllers\Admin\VisitorLogsController::class);
    Route::resource('/borrow', App\Http\Controllers\Admin\BorrowController::class);

    Route::post('/users/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    // Route::view('/borrow', 'app.borrow')->name('borrow');
    Route::get('/borrow', [App\Http\Controllers\Admin\BorrowController::class, 'borrow'])->name('borrow');
    Route::view('/visitor', 'app.components.visitor')->name('visitor');
    Route::resource('/settings', App\Http\Controllers\SettingController::class);
});

// Success Borrowed
Route::get('/borrow/{borrowId}', [App\Http\Controllers\Admin\BorrowController::class, 'borrowedBook'])->name('borrow.success');

Route::prefix('admin')->group(function () {
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('/borrow-books', App\Http\Controllers\Admin\MonitorController::class); // Borrow Books
        Route::resource('/book-return', App\Http\Controllers\Admin\ReturnController::class); // Book Return
        Route::resource('/books', App\Http\Controllers\Admin\BooksController::class);
        Route::post('monitor/{id}/mark-update', [App\Http\Controllers\Admin\MonitorController::class, 'markUpdate'])->name('monitor.mark-update');
    });
});