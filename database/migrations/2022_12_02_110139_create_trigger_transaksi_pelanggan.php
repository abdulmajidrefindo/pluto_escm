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
        DB::unprepared('
        CREATE TRIGGER `mengurangi_stok_barang_saat_transaksi_pelanggan` AFTER INSERT ON `transaksi_barang_pelanggan`
        FOR EACH ROW BEGIN
        UPDATE barang SET barang.total_stok = barang.total_stok - NEW.kuantitas,  barang.total_terjual = barang.total_terjual + NEW.kuantitas WHERE barang.id = NEW.barang_id;

        UPDATE transaksi_pelanggan
        INNER JOIN
        barang ON NEW.barang_id = barang.id
        SET
        transaksi_pelanggan.total_harga = transaksi_pelanggan.total_harga + NEW.kuantitas * barang.harga WHERE transaksi_pelanggan.id = NEW.transaksi_pelanggan_id;
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trigger_transaksi_pelanggan');
    }
};
