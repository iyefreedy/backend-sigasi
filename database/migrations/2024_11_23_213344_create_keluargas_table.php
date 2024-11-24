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
        Schema::create('keluarga', function (Blueprint $table) {
            $table->uuid('IDKeluarga')->primary();
            $table->char('NomorKK', 16);
            $table->string('Alamat');
            $table->foreignId('IDDesa');
            $table->foreignId('IDKecamatan');
            $table->timestamp('LastUpdateDate')->useCurrent()->useCurrentOnUpdate();
            $table->foreignUuid('LastUpdateBy');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluarga');
    }
};
