<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProkerTimelineTable extends Migration
{
    public function up()
    {
        Schema::create('proker_timeline', function (Blueprint $table) {
            $table->id();
            $table->enum('bulan', [
                'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            ]);
            $table->longText('kegiatan');
            $table->enum('status', ['terlaksana', 'berlangsung', 'gagal', 'belum'])->default('belum');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proker_timeline');
    }
}
