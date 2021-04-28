<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bill_id')->unsigned();
            $table->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade');
            $table->string('date')->nullable();
            $table->string('time_in')->nullable();
            $table->string('time_out')->nullable();
            $table->string('lunch_time')->nullable();
            $table->string('day')->nullable();
            $table->string('total_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_logs');
    }
}