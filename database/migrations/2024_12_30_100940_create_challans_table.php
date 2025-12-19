<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallansTable extends Migration
{
    public function up()
    {
        Schema::create('challans', function (Blueprint $table) {
            $table->id();
            $table->string('fir_no');
            // $table->year('year')->nullable();
            $table->string('case_type'); 
            $table->text('case_desc')->nullable();
            $table->string('supplementary_type')->nullable();
            $table->string('challan_type'); 
            // $table->date('date_of_fir')->nullable();
            $table->date('challan_submission_date');
            // $table->string('offence'); 
            $table->string('investigating_officer');
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('assign_to')->nullable(); 
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('assign_to')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('challans');
    }
}

