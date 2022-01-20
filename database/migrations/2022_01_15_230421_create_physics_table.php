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
            $table->integer('person_id');
            $table->string('cpf', 11)->unique();
            $table->date('date_birth')->nullable();
            $table->string('genre', 1)->nullable();
            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('persons');
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
