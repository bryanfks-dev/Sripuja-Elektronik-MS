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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->integerIncrements('id')->primary();
            $table->bigInteger('user_id')->unsigned();
            $table->string('nama_lengkap')->index();
            $table->string('alamat')->index();
            $table->string('telepon')->nullable()->index();
            $table->string('no_hp', 13)->index();
            $table->integer('gaji')->unsigned();
            $table->integer('gaji_bln_ini')->unsigned();
            $table->enum('tipe', ['Kasir','Non-Kasir'])
                ->default('Non-Kasir')->index();

            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
