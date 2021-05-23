<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            // $table->string('details')->nullable();
            $table->integer('price');
            $table->text('description');
            $table->text('image');
            $table->boolean('featured')->default(false);
            $table->foreign('category_id')->references('id')
            ->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
