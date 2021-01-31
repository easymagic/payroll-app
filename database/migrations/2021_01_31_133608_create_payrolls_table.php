<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     * user_id
    Net_pay
    Gross_pay
    Deductions
    Allowances

     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->nullable();
            $table->string('net_pay')->nullable();
            $table->string('gross_pay')->nullable();
            $table->string('deductions')->nullable();
            $table->string('allowances')->nullable();
            $table->string('month_year')->nullable();

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
        Schema::dropIfExists('payrolls');
    }
}
