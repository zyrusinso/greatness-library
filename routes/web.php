<?php

use Illuminate\Support\Facades\Route;


if (App::environment('production')) {
    URL::forceScheme('https');
}


@include_once('app.php');

// Route::get('/', function () {
//     return redirect()->route('index');
// })->name('index');

// Route::redirect('/', '/admin/dashboard', 301);
// Route::redirect('/home', '/admin/dashboard', 301);

// Route::view('/', 'app.welcome')->name('index');
// Route::post('/users/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
// // Route::view('/borrow', 'app.borrow')->name('borrow');
// Route::get('/borrow', [App\Http\Controllers\Admin\BorrowController::class, 'borrow'])->name('borrow');
// Route::view('/visitor', 'app.components.visitor')->name('visitor');

// // Success Borrowed
// Route::get('/borrow/{borrowId}', [App\Http\Controllers\Admin\BorrowController::class, 'borrowedBook'])->name('borrow.success');

// Route::prefix('admin')->group(function () {
//     // Route::view('/logs', 'app.admin.visitor.index')->name('admin.logs');
//     Route::resource('/visitor-logs', App\Http\Controllers\Admin\VisitorLogsController::class);
//     Route::resource('/borrow', App\Http\Controllers\Admin\BorrowController::class);

//     Route::middleware(['auth', 'admin'])->group(function () {
//         Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
//         Route::resource('/monitor', App\Http\Controllers\Admin\MonitorController::class);
//         Route::resource('/books', App\Http\Controllers\Admin\BooksController::class);
//         Route::post('monitor/{id}/mark-update', [App\Http\Controllers\Admin\MonitorController::class, 'markUpdate'])->name('monitor.mark-update');
//     });
// });

Auth::routes();