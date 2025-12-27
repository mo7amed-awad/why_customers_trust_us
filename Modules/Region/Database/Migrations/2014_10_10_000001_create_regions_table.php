<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('country_id')->nullable()->references('id')->on('countries')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();

            $table->boolean('status')->default(1);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('regions');
    }
}
