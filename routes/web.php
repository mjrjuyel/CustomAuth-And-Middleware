<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// midle ware 
use App\Http\Middleware\CheckIfNotCustomer;
use App\Http\Middleware\AdminMiddleware;


use App\Http\Controllers\Frontend\CusLoginController;
use App\Http\Controllers\Frontend\CusRegisterController;

// Admin Auth create
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// login Auth Controller
Route::get('/customer/login',[CusLoginController::class,'login']);
Route::get('/customer/login/insert',[CusLoginController::class,'loginInsert']);
Route::get('/customer/register',[CusRegisterController::class,'register']);
Route::post('/customer/register/insert',[CusRegisterController::class,'registerInsert']);
Route::get('/customer/logout',[CusRegisterController::class,'logout']);

Route::middleware('customer')->group(function(){
    Route::get('web',function(){
        return 'This is web page for auth user';
    });
});
// Admin Auth create 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');
    Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
});


require __DIR__.'/auth.php';
