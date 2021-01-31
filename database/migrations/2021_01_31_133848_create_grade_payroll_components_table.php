<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradePayrollComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * Grade_id
    Payroll_component_id

     */
    public function up()
    {
        Schema::create('grade_payroll_components', function (Blueprint $table) {
            $table->id();


            $table->integer('grade_id')->nullable();
            $table->integer('payroll_component_id')->nullable();



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
        Schema::dropIfExists('grade_payroll_components');
    }
}
