<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->integer('id_people');
            $table->string('city');
            $table->string('district');
            $table->string('complement')->nullable();
            $table->string('public_place')->nullable();
            $table->string('uf')->nullable();
            $table->string('county')->nullable();
            $table->string('zip_code');
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
        Schema::dropIfExists('addresses');
    }
}
