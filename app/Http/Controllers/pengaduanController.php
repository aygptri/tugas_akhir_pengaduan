<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class PengaduanController extends Controller
{
    public function tampil($id)
{
    $laporan = Laporan::findOrFail($id); 
    return view('detail', compact('laporan'));
}

    public function create()
    {
        
        return view('pengaduan.tulisan');
    }
 public function index()
{
    if (auth()->user()->hasRole(['admin', 'penulis'])) {
        $laporan = Laporan::latest()->get();
    } else {
        $laporan = Laporan::where('user_id', auth()->id())->latest()->get();
    }

    return view('dashboard', compact('laporan'));
}



    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'foto' => ['nullable', 'image', ],
        ]);

    $fotoPath = null;
    if ($request->hasFile('foto')) {
     $fotoPath = $request->file('foto')->store('uploads', 'public');
    }


        Laporan::create([
            'user_id' => auth()->id(),
            'judul' => $request->judul,
            'isi' => $request->isi,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('dashboard')->with('success', 'Pengaduan berhasil dikirim!');
    }

      public function destroy($id){
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();
        
        return redirect()->route('dashboard')->with('success', 'User berhasil dihapus.');

    }

public function operatorIndex()
{
    $laporan = Laporan::latest()->get();
    return view('operator.daftar', compact('laporan'));
}
    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:diterima,diproses,selesai,ditolak',
    ]);

    $laporan = Laporan::findOrFail($id);
    $laporan->status = $request->status;
    $laporan->save();

    return redirect()->back()->with('success', 'Status berhasil diperbarui.');
}


 public function show($id)
    {
        $laporan = Laporan:: findOrFail($id);
            
        return view('pengaduan.detail', compact('pengaduan'));
    }
    
    public function tanggapan($id)
    {
}}