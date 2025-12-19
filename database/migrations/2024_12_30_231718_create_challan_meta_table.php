<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallanMetaTable extends Migration
{
    public function up()
    {
        Schema::create('challans_meta', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('fir_id');
            $table->string('accused_name'); 
            $table->string('father_name'); 
            $table->string('accuse_status'); 
            $table->boolean('juvenile')->default(false);
            $table->boolean('gbv')->default(false); 
            $table->string('juvenile_gender')->nullable(); 
            $table->string('gbv_gender')->nullable(); 
            $table->timestamps();
            $table->foreign('fir_id')->references('id')->on('firs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('challans_meta');
    }
}

