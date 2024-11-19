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
        Schema::create('penduduk', function (Blueprint $table) {
            $table->uuid('IDPenduduk')->primary();
            $table->char('KTP', 16)->nullable();
            $table->string('Nama', 100);
            $table->string('Alamat', 100);
            $table->string('Desa', 50);
            $table->date('TanggalLahir');
            $table->enum('JenisKelamin', ['Laki-Laki', 'Perempuan']);
            $table->foreignUuid('IDKelompok');
            $table->timestamp('LastUpdateDate')->useCurrent()->useCurrentOnUpdate();
            $table->foreignUuid('LastUpdateBy');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduk');
    }
};
