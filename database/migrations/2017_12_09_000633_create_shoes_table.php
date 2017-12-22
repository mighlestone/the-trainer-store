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
            $table->uuid('id')->unique();
            $table->string('user_id');
            $table->integer('barcode_number')->nullable();
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('model_id')->nullable();
            $table->string('model_description')->nullable();
            $table->unsignedInteger('colour_id');
            $table->string('collaboration')->nullable();
            $table->boolean('gender');
            $table->unsignedInteger('shoe_category_id');
            // Tags are a Many to Many relationship
            $table->integer('price');
            $table->integer('stock_quantity')->default(0);
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('cascade');
            $table->foreign('colour_id')
                ->references('id')
                ->on('colours')
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
