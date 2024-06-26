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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->integerIncrements('id')->primary();
            $table->bigInteger('user_id')->nullable()->unsigned()->index();
            $table->integer('pelanggan_id')->nullable()->unsigned()->index();
            $table->string('no_nota')->unique()->index();

            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('set null');
            $table->foreign('pelanggan_id')->references('id')
                ->on('pelanggans')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
