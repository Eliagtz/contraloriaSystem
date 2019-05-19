<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('period_id')->unsigned();
            $table->float('quantity');
            $table->string('concept');
            $table->string('movement_type');
            $table->timestamps();
        });
        Schema::table('incomes', function (Blueprint $table){
            $table->foreign('period_id')->references('id')->on('periods')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}
