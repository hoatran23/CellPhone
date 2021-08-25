<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HnlProductSpecific extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hnl_product_specific', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prod_screen');
            $table->string('prod_tech');
            $table->string('prod_camera_front');
            $table->string('prod_camera_rear');
            $table->string('prod_chip');
            $table->string('prod_ram');
            $table->string('prod_pin');
            $table->timestamps();
        });

        Schema::table('hnl_product_specific', function (Blueprint $table) {
            $table->integer('prod_id');
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
        Schema::dropIfExists('hnl_product_specific');
    }
}
