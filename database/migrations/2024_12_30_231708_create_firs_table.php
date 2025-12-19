<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirsTable extends Migration
{
    public function up()
    {
        Schema::create('firs', function (Blueprint $table) {
            $table->id();
            $table->string('fir_no')->unique();
            $table->date('fir_date'); 
            $table->string('offence'); 
            $table->string('position'); 
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('police_station')->nullable();
            $table->foreign('police_station')->references('id')->on('police_stations');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('pdf')->nullable(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('firs');
    }
}
