<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->integer('id_people');
            $table->string('natioal_code');
            $table->string('ddd_code');
            $table->string('phone_number');
            $table->string('email')->nullable();
            $table->string('observation')->nullable();
            $table->integer('status')->default(1)->comment('0 = disabled and 1 = enabled');
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
        Schema::dropIfExists('contacts');
    }
}
