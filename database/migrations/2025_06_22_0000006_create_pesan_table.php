<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesan', function (Blueprint $table) {
            $table->id();
            $table->string('email')->index(); // Email pengguna
            $table->text('pesan'); // Isi pesan kritik/saran
            $table->string('status')->default('belum dibalas');
            $table->timestamps(); // Tanggal dibuat dan diperbarui
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pesan', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
