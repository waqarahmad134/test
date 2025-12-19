<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallansVictimsTable extends Migration
{
    public function up()
    {
        Schema::create('challans_victims', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('challan_id');
            $table->string('victim');
            $table->timestamps();
            $table->foreign('challan_id')->references('id')->on('challans')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('challans_victims');
    }
}
