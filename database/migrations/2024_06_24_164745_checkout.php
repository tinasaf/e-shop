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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Kolom untuk menyimpan ID pengguna
            $table->unsignedBigInteger('product_id');
            $table->timestamps();
            $table->integer('quantity');
            $table->foreign('user_id');
            $table->foreign('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
