<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('no action')->cascadeOnUpdate();
            $table->text('description');
            $table->unsignedBigInteger('price');
            $table->string('photo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
