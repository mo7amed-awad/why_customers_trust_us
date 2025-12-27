<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiddingsTable extends Migration
{
    public function up()
    {
        Schema::create('biddings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->nullable()->references('id')->on('brands')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('model_id')->nullable()->references('id')->on('models')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('title_ar');
            $table->string('title_en');
            $table->text('desc_ar');
            $table->text('desc_en');
            $table->timestamp('bid_time');
            $table->boolean('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('bidding_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bidding_id')->nullable()->references('id')->on('biddings')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('image')->nullable();
            $table->integer('arrangement')->nullable();
            $table->timestamps();
        });
        Schema::create('bidding_specification', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar');
            $table->string('title_en');
            $table->foreignId('bidding_id')->nullable()->references('id')->on('biddings')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('specification_id')->nullable()->references('id')->on('specifications')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bidding_specification');
        Schema::dropIfExists('bidding_images');
        Schema::dropIfExists('biddings');
    }
}
