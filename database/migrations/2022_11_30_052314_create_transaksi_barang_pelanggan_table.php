<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_barang_pelanggan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_pelanggan_id')->constrained('transaksi_pelanggan');
            $table->foreignId('users_id')->constrained('users');
            $table->foreignId('barang_id')->constrained('barang');
            $table->enum('status_transaksi',['Berhasil','Ditolak']);
            $table->integer('kuantitas')->length(7);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_barang_pelanggan');
    }
};
