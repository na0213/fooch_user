<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('store_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('product_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('user_id')->nullable()
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('set null');
            $table->integer('quantity');
            $table->unsignedInteger('price');
            $table->unsignedInteger('total_price');
            $table->unsignedInteger('shipping_fee');
            $table->string('order_status')->default('prior');
            $table->string('payment_status')->default('before_payment');
            $table->string('shipping_name');
            $table->string('shipping_zipcode');
            $table->string('shipping_prefecture');
            $table->string('shipping_city');
            $table->string('shipping_tel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
