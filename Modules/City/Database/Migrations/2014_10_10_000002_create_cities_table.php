<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();

            $table->foreignId('region_id')->nullable()->references('id')->on('regions')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();

            $table->boolean('status')->default(1);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
