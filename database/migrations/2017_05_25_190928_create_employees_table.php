<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id')->unsigned();
            $table->integer('branch_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->string('name', 150);
            $table->string('registration', 15);
            $table->date('admitted_at');
            $table->double('salary', 10, 2);


            $table->foreign('department_id')->references('department_id')->on('branch_departments');
            $table->foreign('branch_id')->references('branch_id')->on('branch_departments');
            $table->foreign('role_id')->references('id')->on('roles');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
