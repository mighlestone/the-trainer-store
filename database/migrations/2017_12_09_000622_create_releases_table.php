<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('releases', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->unsignedInteger('release_type_id');
            $table->string('user_id');
            $table->unsignedInteger('brand_id');
            $table->unsignedInteger('model_id')->nullable();
            $table->string('model_description')->nullable();
            $table->unsignedInteger('colour_id');
            $table->string('collaboration')->nullable();
            $table->unsignedInteger('location_id');
            $table->boolean('gender');
            $table->unsignedInteger('shoe_category_id');
            $table->boolean('converted');
            $table->string('converted_id')->nullable();
            $table->integer('price')->nullable();
            $table->string('image')->nullable();
            $table->integer('known_quantity')->nullable();
            $table->dateTime('date')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('release_type_id')
                ->references('id')
                ->on('release_types')
                ->onDelete('cascade');
            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('cascade');
            $table->foreign('colour_id')
                ->references('id')
                ->on('colours')
                ->onDelete('cascade');
            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
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
        Schema::dropIfExists('releases');
    }
}
