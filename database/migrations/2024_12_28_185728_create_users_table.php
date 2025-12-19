<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active'); 
            $table->string('password');
            $table->rememberToken();
            $table->string('role')->default('user');
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('tehsil_id')->nullable();
            $table->unsignedBigInteger('station_id')->nullable();
            $table->timestamps();

            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
            $table->foreign('tehsil_id')->references('id')->on('tehsils')->onDelete('set null');
            $table->foreign('station_id')->references('id')->on('police_stations')->onDelete('set null');

            $table->index('district_id');
            $table->index('tehsil_id');
            $table->index('station_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
