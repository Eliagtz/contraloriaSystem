<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned;
            $table->date('start');
            $table->date('end');
            $table->string('description');
            $table->boolean('status')->default(1);
            $table->float('initial_fund')->nullable();
            $table->float('final_fund');
            $table->timestamps();
        });

        Schema::table('periods', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periods');
    }
}
