<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string("code");
            $table->enum("status", ["draft", "trash", "published"]);
            $table->dateTimeTz("imported_t");
            $table->longText("url")->nullable();
            $table->string("creator")->nullable();
            $table->string("created_t")->nullable();
            $table->string("last_modified_t")->nullable();
            $table->string("product_name")->nullable();
            $table->string("quantity")->nullable();
            $table->string("brands")->nullable();
            $table->longText("categories")->nullable();
            $table->longText("labels")->nullable();
            $table->longText("cities")->nullable();
            $table->longText("purchase_places")->nullable();
            $table->string("stores")->nullable();
            $table->longText("ingredients_text")->nullable();
            $table->longText("traces")->nullable();
            $table->string("serving_size")->nullable();
            $table->string("serving_quantity")->nullable();
            $table->string("nutriscore_score")->nullable();
            $table->string("nutriscore_grade")->nullable();
            $table->string("main_category")->nullable();
            $table->longText("image_url")->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
