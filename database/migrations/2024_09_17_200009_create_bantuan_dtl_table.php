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
        Schema::create('bantuan_dtl', function (Blueprint $table) {
            $table->uuid('IDBantuanDTL')->primary();
            $table->foreignUuid('IDBantuan');
            $table->foreignUuid('IDBarang');
            $table->integer('Jumlah');

            $table->foreign('IDBantuan')->references('IDBantuan')->on('bantuan');
            $table->foreign('IDBarang')->references('IDBarang')->on('barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bantuan_dtl');
    }
};
