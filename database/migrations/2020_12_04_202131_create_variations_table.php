<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variations', function (Blueprint $table) {
            $table->id();
            $table->integer('attribute_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('material_value')->nullable();
            $table->string('material_code')->nullable();
            $table->string('sku')->nullable();
            $table->string('price')->nullable();
            $table->string('stock')->nullable();
            $table->integer('cushion_option')->nullable();
            $table->integer('lateral_option')->nullable();
            $table->integer('central_option')->nullable();
            $table->string('material_image_id')->nullable();
            $table->string('material_color')->nullable();
            $table->string('care_image_id')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('variations');
    }
}
