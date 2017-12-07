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
            $table->uuid('id');
            $table->unsignedInteger('release_type_id');
            $table->string('user_id');
            $table->string('shoe_id');
            $table->unsignedInteger('location_id');
            $table->integer('price')->nullable();
            $table->integer('known_quantity')->nullable();
            $table->dateTime('date')->nullable();
            $table->timestamps();

            $table->foreign('shoe_id')
                ->references('id')
                ->on('shoes')
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
