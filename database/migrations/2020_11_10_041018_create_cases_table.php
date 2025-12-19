<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->id();
            $table->string('file_number');
            $table->date('reference');
            $table->string('case_type');
            $table->string('case_number');
            $table->string('offence');
            $table->string('police_station');
            $table->string('plaintiff');
            $table->string('defendant');
            $table->date('decision_date');
            $table->string('decision');
            $table->string('court_name');
            $table->date('decision_year');
            $table->string('rack_number');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('cases');
    }
}
