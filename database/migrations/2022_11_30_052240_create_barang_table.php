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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->constrained('produk');
            $table->foreignId('pemasok_id')->constrained('pemasok');
            $table->foreignId('merek_id')->constrained('merek');
            $table->integer('harga')->length(15);
            $table->integer('sku')->length(20);
            $table->integer('total_terjual')->length(7);
            $table->integer('total_masuk')->length(7);
            $table->integer('total_stok')->length(7);
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
        Schema::dropIfExists('barang');
    }
};
