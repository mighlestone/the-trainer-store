<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_transactions', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->boolean('action');
            $table->string('user_id');
            $table->string('shoe_id');
            $table->unsignedInteger('shoe_size_id');
            $table->integer('quantity')->default(0);
            $table->integer('total_price');
            // Fees are a one to many relationship
            $table->timestamps();

            $table->foreign('shoe_id')
                ->references('id')
                ->on('shoes')
                ->onDelete('cascade');
            $table->foreign('shoe_size_id')
                ->references('id')
                ->on('shoe_sizes')
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
        Schema::dropIfExists('stock_transactions');
    }
}
