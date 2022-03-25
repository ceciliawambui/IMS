<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_categories', function (Blueprint $table) {
            // $table->integer('supplier_id')->unsigned();
            // $table->integer('category_id')->unsigned();

            // $table->foreign('supplier_id')->references('id')->on('suppliers')
            //     ->onDelete('cascade');
            // $table->foreign('category_id')->references('id')->on('categories')
            //     ->onDelete('cascade');
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('category_id');

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_categories');
    }
};
