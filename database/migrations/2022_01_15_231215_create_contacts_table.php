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
            $table->integer('people_id');
            $table->string('natioal_code', 2);
            $table->string('ddd_code', 2);
            $table->string('phone_number', 9);
            $table->string('email')->unique()->nullable();
            $table->string('observation')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
