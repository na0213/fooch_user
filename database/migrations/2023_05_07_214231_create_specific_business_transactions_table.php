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
        Schema::create('specific_business_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('store_id')
            ->constrained('stores')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('business_name');
            $table->string('representative_name');
            $table->string('zipcode');
            $table->string('prefecture');
            $table->string('city')->nullable();
            $table->string('tel');
            $table->string('contact')->nullable();
            $table->text('business_days')->nullable(); //営業日
            $table->string('sale_price')->default('各商品詳細ページに記載された金額(税込)'); //販売価格
            $table->string('shipping_cost')->default('各商品詳細ページに記載された金額(税込)'); //送料
            $table->string('delivery')->nullable(); //配送
            $table->string('payment_method')->default('クレジットカード'); //支払い方法
            $table->string('payment_timing')->default('商品購入完了時'); //支払い時期
            $table->text('return_exchange')->nullable(); //返品交換
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specific_business_transactions');
    }
};
