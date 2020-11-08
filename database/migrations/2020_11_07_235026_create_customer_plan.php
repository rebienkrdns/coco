<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerPlan extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('customer_plan', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('id_user');
      $table->foreign('id_user')->references('id')->on('users')->onDelete('RESTRICT')->onUpdate('CASCADE');
      $table->unsignedBigInteger('id_time_lapse');
      $table->foreign('id_time_lapse')->references('id')->on('time_lapses')->onDelete('RESTRICT')->onUpdate('CASCADE');
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
    Schema::dropIfExists('customer_plan');
  }
}
