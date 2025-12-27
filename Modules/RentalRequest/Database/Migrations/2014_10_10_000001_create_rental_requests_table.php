<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('rental_requests', function (Blueprint $table) {
            $table->id();

            $table->foreignId('rental_id')->nullable()->references('id')->on('rentals')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('payment_id')->nullable()->references('id')->on('payments')->constrained()->onDelete('cascade')->onUpdate('cascade');
            
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            
            $table->decimal('sub_total', 10, 3)->nullable();
            $table->decimal('vat', 10, 3)->nullable();
            $table->decimal('net_total', 10, 3)->nullable();

            $table->string('phone_code')->nullable();
            $table->string('country_code')->nullable();
            $table->string('phone')->nullable();
            
            $table->boolean('paid')->default(0);
            
            $table->softDeletes();
            $table->timestamps();
            $table->string('tap_id')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rental_requests');
    }
}
