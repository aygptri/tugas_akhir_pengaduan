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
     public function index(Request $request)
    {
        $search = $request->input('search');

        if (auth()->user()->hasRole(['admin', 'penulis'])) {
            $laporan = Laporan::when($search, function ($query, $search) {
                return $query->where('judul', 'like', "%$search%")
                             ->orWhere('isi', 'like', "%$search%");
            })->latest()->get();

            $totalPengaduan = Laporan::count();
            $pengaduanDiproses = Laporan::where('status', 'diproses')->count();
            $pengaduanDiterima = Laporan::where('status', 'diterima')->count();
            $pengaduanSelesai = Laporan::where('status', 'selesai')->count();
        } else {
            $laporan = Laporan::where('user_id', auth()->id())
                ->when($search, function ($query, $search) {
                    return $query->where('judul', 'like', "%$search%")
                                 ->orWhere('isi', 'like', "%$search%");
                })->latest()->get();

            $totalPengaduan = Laporan::where('user_id', auth()->id())->count();
            $pengaduanDiproses = Laporan::where('user_id', auth()->id())->where('status', 'diproses')->count();
            $pengaduanDiterima = Laporan::where('user_id', auth()->id())->where('status', 'diterima')->count();
            $pengaduanSelesai = Laporan::where('user_id', auth()->id())->where('status', 'selesai')->count();
        }

        return view('dashboard', compact(
            'laporan', 
            'totalPengaduan', 
            'pengaduanDiproses', 
            'pengaduanDiterima', 
            'pengaduanSelesai'
        ));
    }





    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:100',
            'isi' => 'required',
            'foto' => ['nullable', 'image', ],
        ],[
            'judul.max' => 'hanya bisa mengirim 100 huruf/karakter',
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
        
        return redirect()->route('dashboard')->with('success', 'laporan berhasil dihapus.');

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

    return redirect()->back()->with('success', 'Status berhasil diperbarui');
}


 public function show($id)
    {
        $laporan = Laporan:: findOrFail($id);
            
        return view('pengaduan.detail', compact('pengaduan'));
    }
    
    public function tanggapan($id)
    {
}}