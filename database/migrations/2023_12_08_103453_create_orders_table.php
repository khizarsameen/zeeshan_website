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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_no');
            $table->string('contact')->nullable();
            $table->string('ship_region')->nullable();
            $table->string('ship_firstname')->nullable();
            $table->string('ship_lastname')->nullable();
            $table->string('ship_address')->nullable();
            $table->string('ship_city')->nullable();
            $table->string('ship_postalcode')->nullable();
            $table->string('ship_phone')->nullable();
            $table->tinyInteger('pmnt_type')->nullable();
            $table->string('bill_region')->nullable();
            $table->string('bill_firstname')->nullable();
            $table->string('bill_lastname')->nullable();
            $table->string('bill_address')->nullable();
            $table->string('bill_city')->nullable();
            $table->string('bill_postalcode')->nullable();
            $table->string('bill_phone')->nullable();
            $table->integer('amount')->nullable();
            $table->string('delivery_status')->nullable();
            $table->foreignId('user_id')->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
