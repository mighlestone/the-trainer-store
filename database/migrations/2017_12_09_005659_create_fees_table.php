<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('stock_transaction_id');
            $table->string('label');
            $table->boolean('sum_type');
            $table->text('description')->nullable();
            $table->integer('price');
            $table->timestamps();

            $table->foreign('stock_transaction_id')
                ->references('id')
                ->on('stock_transactions')
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
        Schema::dropIfExists('fees');
    }
}
