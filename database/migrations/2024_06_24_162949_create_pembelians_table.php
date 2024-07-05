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
    Schema::create('pembelians', function (Blueprint $table) {
        $table->id();
        $table->string('user_id');
        $table->string('checkout_id');
        $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
        $table->integer('quantity');
        $table->string('status');
        $table->integer('total_harga');
        $table->string('payment_type');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelians');
    }
};
