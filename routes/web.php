<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/create', function () {
    return view('admin.create');
})->name('admin.create');



// dari sini jangan di ubah
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(middleware: ['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    
});

Route::get('dashbord', function(){
    return view('dashboard');

});


Route::get('admin',function(){
    return view('dashboard');
})->middleware(middleware: ['auth', 'verified','role:admin']);


Route::get('penulis',function(){
    return view('dashboard');
})->middleware(middleware: ['auth', 'verified','role:penulis|admin']);


Route::get('tulisan',function(){
    return view('tulisan');
})->middleware(middleware: ['auth', 'verified','role_or_permission:lihat-tulisan|admin']);


require __DIR__.'/auth.php';
//sampai sini