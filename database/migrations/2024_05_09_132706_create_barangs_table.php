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
        Schema::create('barangs', function (Blueprint $table) {
            $table->integerIncrements('id')->primary();
            $table->string('kode_barang')->unique();
            $table->string('nama_barang');
            $table->string('merek');
            $table->integer('stock')->unsigned()->default(0);
            $table->integer('harga_jual')->unsigned();
            $table->integer('harga_beli')->unsigned();
            $table->integer('jumlah_per_grosir')->unsigned()->default(0);
            $table->integer('harga_grosir')->unsigned()->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
