<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->integer('price');

            $table->string('address');
            $table->decimal('lat', 10, 7);
            $table->decimal('lng', 10, 7);

            //facts
            $table->decimal('plot_area',10,2);
            $table->decimal('size_area',10,2);
            $table->integer('built_year');
            $table->decimal('levels',2,1);


            //features
            $table->decimal('bed',2,1);
            $table->decimal('bath',2,1);
            $table->decimal('kitchen',2,1);
            $table->string('garage');
            $table->string('floor');
            $table->string('use');

            //additional features
            $table->string('additional_features');

            //utilities
            $table->string('utilities');

            //around the property
            $table->string('around_property');



            $table->timestamps();
            $table->timestamp('published_at');

            //delete any product belongs to the user
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            
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
        Schema::drop('properties');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
