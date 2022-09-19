<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->length(60);
            $table->string('last_name')->length(60);
            $table->string('middle_name')->length(60);
            $table->string('address')->length(120);
            $table->unsignedBigInteger('department_id')->length(20);
            $table->foreign('department_id')->references('id')->on('departments');
            $table->unsignedBigInteger('country_id')->length(20);
            $table->foreign('country_id')->references('id')->on('countries');
            $table->unsignedBigInteger('state_id')->length(20);
            $table->foreign('state_id')->references('id')->on('states');
            $table->unsignedBigInteger('city_id')->length(20);
            $table->foreign('city_id')->references('id')->on('cities');
            $table->string('zipcode')->length(6);
            $table->date('birth_date');
            $table->date('date_hired');
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
        Schema::dropIfExists('employees');
    }
};
