<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_amount')->length(20)->unsigned();
            $table->string('receipt_number',30);
            $table->integer('customer_id')->unsigned();
            $table->integer('order_category_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('orders',function(Blueprint $table){
            $table->foreign('customer_id')->references('id')
                ->on('customers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('order_category_id')->references('id')
                ->on('order_categories')
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
        Schema::drop('orders');
    }
}
