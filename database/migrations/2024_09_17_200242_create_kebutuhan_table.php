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
        Schema::create('kebutuhan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->uuid('IDKebutuhan')->primary();
            $table->foreignUuid('IDBarang');
            $table->foreignUuid('IDPosko');
            $table->integer('JumlahKebutuhan');
            $table->integer('JumlahDiterima')->default(0);
            $table->timestamp('LastUpdateDate')->useCurrent()->useCurrentOnUpdate();
            $table->foreignUuid('LastUpdateBy');

            $table->foreign('IDPosko')->references('IDPosko')->on('posko');
            $table->foreign('IDBarang')->references('IDBarang')->on('barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kebutuhan');
    }
};
