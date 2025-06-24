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
        Schema::create('pembina', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('jabatan', 50);
            $table->string('tahun_menjabat', 20)->nullable();
            $table->string('nomer_hp', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('alamat', 255)->nullable();
            $table->string('foto', 255)->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembina');
    }
};