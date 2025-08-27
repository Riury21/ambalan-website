<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProkerVisiMisiTable extends Migration
{
    public function up()
    {
        Schema::create('proker_visi_misi', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis', ['visi', 'misi']);
            $table->text('isi');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proker_visi_misi');
    }
}
