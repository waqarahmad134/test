<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliceStationsTable extends Migration
{
    public function up()
    {
        Schema::create('police_stations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('tehsil_id');
            $table->string('name')->unique();
            $table->enum('status', ['active', 'inactive'])->default('active'); 
            $table->timestamps();
            $table->foreign('district_id')
                ->references('id')->on('districts')
                ->onDelete('cascade');

            $table->foreign('tehsil_id')
                ->references('id')->on('tehsils')
                ->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('police_stations');
    }
}
