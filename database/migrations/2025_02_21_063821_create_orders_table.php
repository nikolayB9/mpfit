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
            $table->foreignId('user_id')->index()->constrained('users');
            $table->foreignId('product_id')->index()->constrained('products');
            $table->decimal('product_price');
            $table->integer('qty');
            $table->decimal('total_price');
            $table->unsignedSmallInteger('status')->default(\App\Enums\Order\StatusEnum::NEW);
            $table->text('comment')->nullable();
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
