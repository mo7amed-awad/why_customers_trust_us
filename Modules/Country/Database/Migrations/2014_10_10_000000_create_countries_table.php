<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();

            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();

            $table->string('currancy_code_ar')->nullable();
            $table->string('currancy_code_en')->nullable();

            $table->decimal('currancy_value', 10, 3)->nullable();
            $table->string('phone_code')->nullable();
            $table->string('country_code')->nullable();
            $table->integer('length')->nullable();
            $table->integer('decimals')->nullable();

            $table->string('image')->nullable();
            $table->boolean('status')->default(1);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
