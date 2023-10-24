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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('kd_pemesanan');
            $table->float('total_harga');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('bukti_pembayaran');
            $table->enum('status', ['pending', 'lunas']);
            $table->foreignId('penginapan_id');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
