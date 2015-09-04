<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->text('hostel_address');
            $table->date('dob');
            $table->string('guardian_name',60);
            $table->string('guardian_phone',20);
            $table->text('guardian_address');
            $table->string('photo_path',255);
            $table->integer('customer_id')->unsigned();
            $table->integer('gender_id')->unsigned();
            $table->integer('state_id')->unsigned();
        });

        Schema::table('customer_profiles',function(Blueprint $table){
            $table->foreign('customer_id')->references('id')
                ->on('customers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('gender_id')->references('id')
                ->on('gender')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('state_id')->references('id')
                ->on('states')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_profiles');
    }
}
