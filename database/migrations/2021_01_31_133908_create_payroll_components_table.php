<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * name
    Type => allowance / deduction
    value_Type => percentage or amount
    value

     */
    public function up()
    {
        Schema::create('payroll_components', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('value_type')->nullable();
            $table->string('value')->nullable();

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
        Schema::dropIfExists('payroll_components');
    }
}
