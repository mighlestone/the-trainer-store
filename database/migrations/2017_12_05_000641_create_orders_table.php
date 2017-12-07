<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id');
            $table->boolean('action');
            $table->string('user_id');
            $table->string('shoe_id');
            $table->string('release_id')->nullable();
            $table->integer('quantity')->default(1);
            $table->integer('price');
            // Fees will be a One to Many relationship
            $table->timestamps();

            $table->foreign('shoe_id')
                ->references('id')
                ->on('shoes')
                ->onDelete('cascade');
            $table->foreign('release_id')
                ->references('id')
                ->on('releases')
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
        Schema::dropIfExists('orders');
    }
}
