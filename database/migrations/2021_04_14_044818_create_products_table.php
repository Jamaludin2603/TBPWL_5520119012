<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('qty');
            $table->string('price');
            $table->unsignedbigInteger('brands_id');
            $table->unsignedbigInteger('categories_id');
            $table->string('photo')->nullable();
            $table->timestamps();

            $table->foreign('brands_id')
                ->references('id')
                ->on('brands')
                ->onUpdate('cascade');

            $table->foreign('categories_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
