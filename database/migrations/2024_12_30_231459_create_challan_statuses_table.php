<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateChallanStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('challan_statuses', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('challan_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('changed_at')->useCurrent(); 
            $table->timestamps();
            $table->foreign('challan_id')->references('id')->on('challans')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('challan_statuses');
    }
}
