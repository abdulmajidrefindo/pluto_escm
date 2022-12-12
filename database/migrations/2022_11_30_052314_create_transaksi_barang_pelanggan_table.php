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
            $table->foreignId('transaksi_pelanggan_id')->constrained('transaksi_pelanggan')->onDelete('cascade');
            $table->foreignId('users_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('barang_id')->constrained('barang')->onDelete('cascade');
            $table->enum('status_transaksi',['Berhasil','Ditolak']);
            $table->integer('kuantitas')->length(7);
            $table->integer('total_harga')->length(10);
            $table->timestamps();
            $table->softDeletes();
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
