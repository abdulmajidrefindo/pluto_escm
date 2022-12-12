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
        Schema::create('users_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_lengkap')->length(100)->nullable();
            $table->string('alamat')->length(100)->nullable();
            $table->string('no_telp')->length(15)->nullable();
            $table->string('jenis_kelamin')->length(10)->nullable();
            $table->string('tempat_lahir')->length(50)->nullable();
            $table->date('tanggal_lahir')->nullable();

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
        Schema::dropIfExists('users_data');
    }
};
