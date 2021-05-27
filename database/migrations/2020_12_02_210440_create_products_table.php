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
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('slug')->unique();
            $table->string('price')->nullable();
            $table->integer('category_id')->nullable();
            $table->longText('description')->nullable();
            $table->string('script_code')->nullable();
            $table->string('distID')->nullable();
            $table->string('solution3DName')->nullable();
            $table->string('projectName')->nullable();
            $table->string('solution3DID')->nullable();
            $table->integer('preview_image_id')->nullable();
            $table->integer('status')->default(1);
            $table->string('seo_title')->nullable();
            $table->string('seo_slug')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
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
