<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration.
     */
    public function up(): void
    {
        Schema::create('pembeli', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('telepon');
            $table->text('alamat');
            $table->timestamps();
        });
    }

    /**
     * Batalkan migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembeli');
    }
};
