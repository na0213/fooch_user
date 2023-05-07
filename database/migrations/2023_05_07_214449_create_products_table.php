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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('shipping_patterns_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');;
            $table->string('name');
            $table->text('info');
            $table->text('ingredients'); //食品成分
            $table->text('additives')->nullable(); //添加物
            $table->text('allergy')->nullable();
            $table->unsignedInteger('price');
            $table->boolean('is_selling')->nullable();
            $table->text('expiration')->nullable(); //賞味期限
            $table->string('sort_order')->nullable();
            $table->string('status')->default('pending');
            $table->datetime('created_at');
            $table->datetime('updated_at');
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
        Schema::dropIfExists('products');
    }
};
