<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaySlipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * Payroll_id
    Payroll_component_id
    Amount

     */
    public function up()
    {
        Schema::create('pay_slips', function (Blueprint $table) {
            $table->id();

            $table->integer('payroll_id')->nullable();
            $table->integer('payroll_component_id')->nullable();
            $table->string('amount')->nullable();

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
        Schema::dropIfExists('pay_slips');
    }
}
