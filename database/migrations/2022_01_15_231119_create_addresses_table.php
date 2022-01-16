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
            $table->integer('people_id');
            $table->string('city');
            $table->string('district');
            $table->string('complement')->nullable();
            $table->string('public_place')->nullable();
            $table->string('uf')->nullable();
            $table->string('county')->nullable();
            $table->string('zip_code');
            $table->integer('status')->default(1)->comment('0 = disabled and 1 = enabled');
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
        Schema::dropIfExists('addresses');
    }
}
