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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->integer('qty')->default(0);
            $table->foreignId('modell_id');
            $table->foreignId('color_id');
            $table->foreignId('country_id');
            $table->foreignId('product_type_id');
            $table->timestamps();

            $table->foreign('modell_id')->references('id')->on('modells');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('product_type_id')->references('id')->on('product_types');
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
};
