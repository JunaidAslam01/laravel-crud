<?php

use App\Http\Controllers\BackPanel\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/dashboard', BookController::class)->names([
        'index' => 'dashboard',
        'create' => 'book.create',
        'store' => 'book.store',
        'edit' => 'book.edit',
        'update' => 'book.update',
        'destroy' => 'book.destroy',
        'show' => 'book.show'
    ])->except(['show']);

    // Route::get('admin/dashboard', [AdminController::class,'dashboard']);
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/user/create', [AdminController::class, 'create'])->name('admin.user.create');
    Route::post('admin/user/create', [AdminController::class, 'store'])->name('admin.user.store');
    Route::get('admin/user/edit/{id}', [AdminController::class, 'edit'])->name('admin.user.edit');
    Route::put('admin/user/update/{id}', [AdminController::class, 'update'])->name('admin.user.update');
    Route::get('admin/user/delete/{id}', [AdminController::class, 'destroy'])->name('admin.user.destroy');
});


require __DIR__ . '/auth.php';
