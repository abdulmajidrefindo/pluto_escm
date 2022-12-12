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
            $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade');
            $table->foreignId('pemasok_id')->constrained('pemasok')->onDelete('cascade');
            $table->foreignId('merek_id')->nullable()->constrained('merek')->onDelete('set null');
            $table->integer('harga')->length(15);
            $table->integer('sku')->length(20);
            $table->integer('total_terjual')->length(7);
            $table->integer('total_masuk')->length(7);
            $table->integer('total_stok')->length(7);
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
        Schema::dropIfExists('barang');
    }
};
