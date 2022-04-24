<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moduls', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('judul', 100);
            $table->string('nama_guru', 100);
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('gambar', 200);
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
        Schema::dropIfExists('moduls');
    }
}
