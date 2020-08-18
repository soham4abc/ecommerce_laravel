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
            $table->string('name')->nullable();
            $table->string('brand')->unique();
            $table->string('price')->unique();
           // $table->timestamp('email_verified_at')->nullable();
            $table->string('quantity');
            $table->string('category')->nullable();
            $table->string('weight')->nullable();
            $table->string('viewed')->nullable();
            $table->string('product_pic')->nullable();
            $table->string('date')->nullable();
            $table->string('token')->nullable();
            $table->id();
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
        Schema::dropIfExists('products');
    }
}
