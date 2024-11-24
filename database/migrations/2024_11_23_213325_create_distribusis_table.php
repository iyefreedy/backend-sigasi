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
        Schema::create('distribusi', function (Blueprint $table) {
            $table->uuid('IDDistribusi')->primary();
            $table->foreignUuid('IDPosko');
            $table->foreignUuid('IDBarang');
            $table->date('TanggalDistribusi');
            $table->unsignedInteger('Jumlah');
            $table->timestamp('LastUpdateDate')->useCurrent()->useCurrentOnUpdate();
            $table->foreignUuid('LastUpdateBy');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribusi');
    }
};
