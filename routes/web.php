<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscountController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    Route::post('/add-disc',[DiscountController::class,'submitDiscount'])->name('add.disc');
    Route::get('/edit-disc/{id}',[DiscountController::class,'editDiscount'])->name('edit.disc');
    Route::post('/update-disc/{id}', [DiscountController::class, 'updatesDisc'])->name('update.disc');
    Route::get('/discount-list',[DiscountController::class,'showList'])->name('disc.list');
    Route::get('/delete-disc/{id}',[DiscountController::class,'deleteDisc'])->name('disc.delete');
    
    Route::get('/apply-discount-form',[DiscountController::class,'applyDiscForm'])->name('disc.applyform');
    Route::post('/apply-disc',[DiscountController::class,'applyDiscount'])->name('apply.disc');
    Route::get('/applied-discount-list',[DiscountController::class,'showAppliedDiscList'])->name('appliedDisc.list');
    

   

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
