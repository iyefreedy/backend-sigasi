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
        Schema::create('barang', function (Blueprint $table) {

            $table->uuid('IDBarang')->primary();
            $table->foreignUuid('IDJenisBarang');
            $table->string('NamaBarang', 20);
            $table->float('HargaSatuan', 0, 2)->default(0);
            $table->timestamp('LastUpdateDate')->useCurrent()->useCurrentOnUpdate();

            $table->foreign('IDJenisBarang')->references('IDJenisBarang')->on('jenis_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
