<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UnemploymentRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unemployment_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('unemployment_reason_id')->unsigned();
            $table->integer('request_status_id')->unsigned();
            $table->longText('justification');
            $table->date('expected_at');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('unemployment_reason_id')->references('id')->on('unemployment_reasons');
            $table->foreign('request_status_id')->references('id')->on('request_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unemployment_requests');
    }
}
