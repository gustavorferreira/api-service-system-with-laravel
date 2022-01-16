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
            $table->integer('people_id');
            $table->string('cpf');
            $table->date('date_birth')->nullable();
            $table->string('genre')->nullable();
            $table->timestamps();

            $table->foreign('people_id')->references('id')->on('peoples');
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
