<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjemputanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjemputan', function (Blueprint $table) {
            $table->id(); // polymorphism
            $table->integer('id_member');
            $table->string('petugas');
            $table->enum('status', ['tercatat', 'penjemputan', 'selesai']);
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
        Schema::dropIfExists('penjemputan');
    }
}
