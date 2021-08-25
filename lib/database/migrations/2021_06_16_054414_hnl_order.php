<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HnlOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hnl_order', function (Blueprint $table) {
            $table->increments('order_id');
            $table->string('order_name_client');
            $table->string('order_phone_client');
            $table->string('order_mail_client');
            $table->string('order_address_client');
            $table->string('order_desc_client')->nullable();
            $table->integer('order_status');
            $table->integer('order_total');
            $table->integer('order_total_profit');
            $table->date('order_date');
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
        Schema::dropIfExists('hnl_order');
    }
}
