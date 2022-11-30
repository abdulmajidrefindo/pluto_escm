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
            $table->increments('id');
            $table->unsignedInteger('transaksi_pelanggan_id');
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('barang_id');
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
