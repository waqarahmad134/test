<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallanRemarksMetaTable extends Migration
{
    public function up()
    {
        Schema::create('challans_remarks_meta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('challan_id');
            $table->unsignedBigInteger('challan_status');
            $table->unsignedBigInteger('approveid');
            $table->text('remarks_code')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->foreign('challan_id')->references('id')->on('challans')->onDelete('cascade');
            $table->foreign('challan_status')->references('id')->on('statuses')->onDelete('cascade');
            $table->foreign('approveid')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('challans_remarks_meta');
    }
}
