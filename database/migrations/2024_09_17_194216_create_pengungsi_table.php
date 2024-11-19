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
        Schema::create('pengungsi', function (Blueprint $table) {
            $table->uuid('IDPengungsi')->primary();
            $table->foreignUuid('IDPenduduk');
            $table->foreignUuid('IDPosko');
            $table->string('KondisiKhusus', 255)->nullable();
            $table->timestamp('LastUpdateDate')->useCurrent()->useCurrentOnUpdate();
            $table->foreignUuid('LastUpdateBy');

            $table->foreign('IDPenduduk')->references('IDPenduduk')->on('penduduk');
            $table->foreign('IDPosko')->references('IDPosko')->on('posko');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengungsi');
    }
};
