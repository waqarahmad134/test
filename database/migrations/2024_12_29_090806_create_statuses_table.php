<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); 
            $table->string('color')->nullable(); 
            $table->string('bgcolor')->nullable(); 
            $table->enum('status', ['active', 'inactive']); 
            $table->timestamps(); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
