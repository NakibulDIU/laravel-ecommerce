<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;



Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/dashboard',[UserController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/add_category',[AdminController::class,'addCategory'])->name('admin.addcategory');

    Route::post('/add_category',[AdminController::class,'postAddCategory'])->name('admin.postaddcategory');


    Route::get('/view_category',[AdminController::class,'viewCategory'])->name('admin.viewcategory');

    Route::get('/delete_category/{id}',[AdminController::class,'deleteCategory'])->name('admin.categorydelete');

    Route::get('/update_category/{id}',[AdminController::class,'updateCategory'])->name('admin.updatecategory');

    Route::post('/update_category/{id}',[AdminController::class,'postUpdateCategory'])->name('admin.postupdatecategory');

    Route::get('/add_product',[AdminController::class,'addProduct'])->name('admin.addproduct');

    Route::post('/add_product',[AdminController::class,'postAddProduct'])->name('admin.postaddproduct');

    Route::get('/view_product',[AdminController::class,'viewProduct'])->name('admin.viewproduct');


    Route::get('/deleteproduct/{id}',[AdminController::class,'deleteProduct'])->name('admin.deleteproduct');

    Route::get('/updateproduct/{id}',[AdminController::class,'updateProduct'])->name('admin.updateproduct');


    Route::post('/add_product/{id}',[AdminController::class,'postAddProduct'])->name('admin.postupdateproduct');



});

require __DIR__.'/auth.php';
