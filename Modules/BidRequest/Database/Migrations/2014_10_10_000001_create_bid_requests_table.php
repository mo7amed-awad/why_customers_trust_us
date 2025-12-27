<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('bid_requests', function (Blueprint $table) {
            $table->id();

            $table->foreignId('bidding_id')->nullable()->references('id')->on('biddings')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->decimal('bid',10,3)->nullable();

            $table->string('phone_code')->nullable();
            $table->string('country_code')->nullable();
            $table->string('phone')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bid_requests');
    }
}
