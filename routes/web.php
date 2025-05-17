<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;




Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/create', [UserController::class, 'create'])->name('siswa.create');
    Route::post('/create', [UserController::class, 'store'])->name('siswa.store');
});








Route::get('/create', function () {
    return view('admin.create');
})->name('admin.create');
Route::get('/rolemanagement', function () {
    return view('admin.rolemanagement');
})->name('admin.rolemanagement');
Route::get('/edit', function () {
    return view('admin.edit');
})->name('admin.edit');



// dari sini jangan di ubah
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(middleware: ['auth', 'verified'])->name('dashboard');







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