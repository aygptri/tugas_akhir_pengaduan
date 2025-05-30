<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
Schema::create('pengaduan', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->string('judul');
    $table->text('isi');
    $table->enum('status', ['dikirim', 'diterima', 'diproses', 'selesai','ditolak'])->default('dikirim');
    $table->string('foto')->nullable();
    $table->dateTime('waktu_kejadian')->nullable();
    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
Schema::dropIfExists('pengaduan');

    }
};
