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

            $table->bigInteger("code");
            $table->enum("status", ["draft", "trash", "published"]);
            $table->dateTimeTz("imported_t");
            $table->longText("url");
            $table->string("creator");
            $table->timestamp("created_t");
            $table->timestamp("last_modified_t");
            $table->string("product_name");
            $table->string("quantity");
            $table->string("brands");
            $table->longText("categories");
            $table->longText("labels");
            $table->longText("cities")->nullable();
            $table->longText("purchase_places");
            $table->string("stores");
            $table->longText("ingredients_text");
            $table->longText("traces");
            $table->string("serving_size");
            $table->float("serving_quantity");
            $table->integer("nutriscore_score");
            $table->string("nutriscore_grade");
            $table->string("main_category");
            $table->longText("image_url");

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
