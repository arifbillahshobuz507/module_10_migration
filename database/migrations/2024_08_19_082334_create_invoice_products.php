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
        Schema::create('invoice_products', function (Blueprint $table) {
            $table->id();
            $table->string('qty', 50);
            $table->string('sell_price', 50);
             //foren key
             $table->unsignedBigInteger('invoice_id');
             $table->unsignedBigInteger('product_id');
             $table->unsignedBigInteger('user_id');

             //relation
             $table->foreign('invoice_id')->references('id')->on('invoices')->restrictOnDelete()->cascadeOnUpdate();
             $table->foreign('product_id')->references('id')->on('products')->restrictOnDelete()->cascadeOnUpdate();
             $table->foreign('user_id')->references('id')->on('users')->restrictOnDelete()->cascadeOnUpdate();


           $table->timestamp('created_at')->useCurrent();
           $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_products');
    }
};
