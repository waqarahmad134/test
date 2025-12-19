<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTehsilsTable extends Migration
{
    public function up()
    {
        Schema::create('tehsils', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('district_id');
            $table->string('name')->unique();
            $table->enum('status', ['active', 'inactive'])->default('active'); 
            $table->timestamps();
            $table->foreign('district_id')
                  ->references('id')->on('districts')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tehsils');
    }
}
