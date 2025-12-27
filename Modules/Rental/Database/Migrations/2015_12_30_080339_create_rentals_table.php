<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->nullable()->references('id')->on('brands')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('model_id')->nullable()->references('id')->on('models')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('title_ar');
            $table->string('title_en');
            $table->decimal('price', 10, 3);
            $table->text('desc_ar');
            $table->text('desc_en');
            $table->boolean('status')->default(1);
            $table->boolean('home')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('rental_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_id')->nullable()->references('id')->on('rentals')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('image')->nullable();
            $table->integer('arrangement')->nullable();
            $table->timestamps();
        });
        Schema::create('rental_specification', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar');
            $table->string('title_en');
            $table->foreignId('rental_id')->nullable()->references('id')->on('rentals')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('specification_id')->nullable()->references('id')->on('specifications')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rental_specification');
        Schema::dropIfExists('rental_images');
        Schema::dropIfExists('rentals');
    }
}
