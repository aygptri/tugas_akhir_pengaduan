<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan'; // karena nama tabel kamu 'pengaduan'
    
    protected $fillable = [
        'user_id',
        'judul',
        'isi',
        'status',
        'foto',
    ];

    // Relasi: laporan ini dimiliki oleh 1 user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
