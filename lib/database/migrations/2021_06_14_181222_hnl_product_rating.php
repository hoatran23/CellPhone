<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HnlProductRating extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hnl_product_rating', function (Blueprint $table) {
            $table->increments('id_rating');
            $table->integer('rate_vote');
            $table->integer('rate_prod_id');
            // $table->string('rate_slug');
            $table->string('rate_comment');
            $table->string('rate_name');
            $table->string('rate_phone');
            $table->string('rate_email');
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
        Schema::dropIfExists('hnl_product_rating');
    }
}
