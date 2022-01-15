<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physics', function (Blueprint $table) {
            $table->integer('id_people');
            $table->string('cpf');
            $table->string('date_birth')->nullable();
            $table->string('genre')->nullable();
            $table->timestamps();

            $table->foreign('id_people')->references('id')->on('peoples');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('physics');
    }
}
