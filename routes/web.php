<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use PhpParser\Node\Expr\FuncCall;
use App\Http\Controllers\PengaduanController;

Route::middleware(['auth', 'role:admin'])->group(function (): void {

    Route::get('/create', [UserController::class, 'create'])->name('admin.create');
    Route::post('/create', [UserController::class, 'store'])->name('admin.store');
    
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.edit');
    Route::put('/edit/{id}', [UserController::class, 'update'])->name('admin.update');
    
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('admin.destroy');
    
    Route::get('/rolemanagement', function () {
        $user = \App\Models\User::all(); 
    return view('admin.rolemanagement', compact('user'));
})->name('admin.rolemanagement');

});


Route::get('/dashboard', [PengaduanController::class, 'index'])->name('dashboard');

Route::middleware(['auth', 'role:user|admin|penulis'])->group(function () {
    Route::get('/pengaduan/tulisan', [PengaduanController::class, 'create'])->name('pengaduan.tulisan');
    Route::post('/pengaduan/tulisan', [PengaduanController::class, 'store'])->name('pengaduan.kirim');
    Route::delete('/laporan/{id}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');
    Route::get('/detail/{id}', [PengaduanController::class, 'tampil'])->name('detail');
    
});

Route::middleware(['auth', 'role:penulis|admin'])->group(function () {
    Route::get('/operator/daftar', [PengaduanController::class, 'operatorIndex'])->name('operator.daftar');
    Route::post('/operator/daftar/{id}/status', [PengaduanController::class, 'updateStatus'])->name('operator.status.update');
});





Route::middleware(['auth'])->group(function () {
    Route::get('/pengaduan/{id}', [PengaduanController::class, 'show'])->name('pengaduan.show');
    Route::get('/pengaduan', [UserController::class, 'create'])->name('admin.create');
    
  
    Route::get('/pengaduan/{id}/tanggapan', [PengaduanController::class, 'tanggapan'])->name('pengaduan.tanggapan');
});




// dari sini jangan di ubah
Route::get('/', function () {
    return view('welcome');
});








Route::get('admin', function () {
    return redirect()->route('dashboard');
})->middleware(['auth', 'verified', 'role:admin']);


Route::get('penulis',function(){
    return redirect()->route('dashboard');
})->middleware(middleware: ['auth', 'verified','role:penulis|admin']);


Route::get('tulisan',function(){
    return redirect()->route('dashboard');
})->middleware(middleware: ['auth', 'verified','role_or_permission:lihat-tulisan|admin']);



require __DIR__.'/auth.php';
//sampai sini