<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->integer('quantity')->default(1);
            $table->decimal('price');
            $table->Integer('product_id')->unsigned()->index();
            $table->BigInteger('attribute_id')->unsigned()->index();
            $table->timestamps();
        });

        Schema::table('product_attributes', function (Blueprint $table) {
          $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
          $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attributes');
    }
}
