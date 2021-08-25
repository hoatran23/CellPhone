<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HnlCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hnl_categories', function (Blueprint $table) {
            $table->increments('cate_id');
            $table->string('cate_name');
            $table->string('cate_slug');
            $table->timestamps(); // tạo ra các kí tự không có khoảng trắng, chúng nối với nhau bằng các dấu (-) và thường để trên đường link
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hnl_categories');
    }
}
