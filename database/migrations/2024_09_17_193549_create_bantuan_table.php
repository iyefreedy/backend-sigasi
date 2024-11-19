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
        Schema::create('bantuan', function (Blueprint $table) {
            $table->uuid('IDBantuan')->primary();
            $table->foreignUuid('IDDonatur');
            $table->dateTime('TanggalBantuan');
            $table->timestamp('LastUpdateDate')->useCurrent()->useCurrentOnUpdate();
            $table->foreignUuid('LastUpdateBy');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bantuan');
    }
};
