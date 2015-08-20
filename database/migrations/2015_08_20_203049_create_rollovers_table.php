<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolloversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rollovers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rollover_from_user');
            $table->integer('rollover_to_user');
            $table->integer('rollover_amount')->length(20)->unsigned();
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
        Schema::drop('rollovers');
    }
}
