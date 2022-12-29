<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_transaction', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('transaction_id');
            $table->foreign('transaction_id')->references('id')->on('transaction')->onDelete('no action')->cascadeOnUpdate();
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('no action')->cascadeOnUpdate();
            $table->unsignedInteger('quantity');
            $table->unsignedBigInteger('price');
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
        Schema::dropIfExists('detail_transaction');
    }
}
