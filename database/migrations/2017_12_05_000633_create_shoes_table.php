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
            $table->unsignedInteger('model_id');
            $table->string('gender');
            $table->unsignedInteger('shoe_category_id');
            // Tags are a Many to Many relationship
            // Maybe price can be collected over average sold price
            $table->integer('price');
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
        Schema::dropIfExists('shoes');
    }
}
