<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/create', [UserController::class, 'create'])->name('admin.create');
    Route::post('/create', [UserController::class, 'store'])->name('admin.store');

    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.edit');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('admin.update');

    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('admin.delete');

    Route::get('/rolemanagement', action: function () {
        return view('admin.rolemanagement');
    })->name('admin.rolemanagement');

});





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


Route::get('detail',function(){
    return view('detail');
});


require __DIR__.'/auth.php';
//sampai sini