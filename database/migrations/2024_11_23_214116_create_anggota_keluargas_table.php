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
        Schema::create('anggota_keluarga', function (Blueprint $table) {
            $table->uuid('IDAnggotaKeluarga')->primary();
            $table->foreignUuid('IDKeluarga');
            $table->foreignUuid('IDPenduduk');
            $table->enum('Hubungan', ['Kepala Keluarga', 'Istri', 'Anak', 'Orang Tua', 'Lainnya']);
            $table->timestamp('LastUpdateDate')->useCurrent()->useCurrentOnUpdate();
            $table->foreignUuid('LastUpdateBy');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_keluarga');
    }
};
