<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProkerProgramUmumTable extends Migration
{
    public function up()
    {
        Schema::create('proker_program_umum', function (Blueprint $table) {
            $table->id();
            $table->string('nama_program');
            $table->enum('status', ['terlaksana', 'berlangsung', 'gagal', 'belum'])->default('belum');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proker_program_umum');
    }
}