<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageProductPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_product', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('image_id')->unsigned()->index();
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
            
            $table->integer('product_id')->unsigned()->index();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
           
            // $table->primary(['image_id', 'product_id']);
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('image_product');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
