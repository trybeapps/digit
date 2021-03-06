<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {

            $table->uuid('id');
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('interval', 10);
            $table->string('paystack_plan_code', 20)->nullable();
            $table->float('amount');
            $table->string('currency')->default('NGN');
            $table->string('status')->default('draft');
            $table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
