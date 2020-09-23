<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('foto')->nullable();
            $table->string('judul', 191);
            $table->string('slug', 191);
            $table->text('isi');
            $table->date('tgl_kejadian')->nullable();
            $table->string('lokasi_kejadian', 191);
            $table->enum('status', ['<span class="text-warning">Menunggu</span>', '<span class="text-info">Diproses</span>', '<span class="text-success">Selesai</span>'])->default('<span class="text-warning">Menunggu</span>');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
