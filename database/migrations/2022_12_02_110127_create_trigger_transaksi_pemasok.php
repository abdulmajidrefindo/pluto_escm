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
        CREATE TRIGGER `menambah_stok_barang_saat_transaksi_pemasok` AFTER INSERT ON `transaksi_barang_pemasok`
        FOR EACH ROW BEGIN
        UPDATE barang SET barang.total_stok = barang.total_stok + NEW.kuantitas,  barang.total_masuk = barang.total_masuk + NEW.kuantitas WHERE barang.id = NEW.barang_id;

        UPDATE transaksi_pemasok
        INNER JOIN
        barang ON NEW.barang_id = barang.id
        SET
        transaksi_pemasok.total_harga = transaksi_pemasok.total_harga + NEW.kuantitas * barang.harga WHERE transaksi_pemasok.id = NEW.transaksi_pemasok_id;
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
        Schema::dropIfExists('trigger_transaksi_pemasok');
    }
};
