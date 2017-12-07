<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoes', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('user_id');
            $table->unsignedInteger('brand_id');
            $table->integer('barcode_number')->nullable();
            $table->unsignedInteger('model_id')->nullable();
            $table->boolean('gender');
            $table->unsignedInteger('shoe_category_id');
            // Tags are a Many to Many relationship
            // Maybe price can be collected over average sold price
            $table->integer('price');
            $table->string('image');
            $table->timestamps();

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('cascade');
            $table->foreign('shoe_category_id')
                ->references('id')
                ->on('shoe_categories')
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
        Schema::dropIfExists('shoes');
    }
}
