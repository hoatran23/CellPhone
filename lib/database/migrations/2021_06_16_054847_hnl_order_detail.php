<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HnlOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hnl_order_detail', function (Blueprint $table) {
            $table->increments('order_id_detail_stt');
            $table->integer('order_id_product');
            $table->string('order_name_product');
            $table->string('order_qty_product');
            $table->string('order_img_product');
            $table->integer('order_price_product');
            $table->integer('order_prod_profit');
            $table->integer('order_id_detail');
            $table->foreign('order_id_detail')
                  ->references('order_id')
                  ->on('hnl_order')
                  ->onDelete('cascade');  
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
        Schema::dropIfExists('hnl_order_detail');
    }
}
