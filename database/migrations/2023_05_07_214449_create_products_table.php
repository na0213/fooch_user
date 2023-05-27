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
            $table->text('content_volume'); //内容量
            $table->text('ingredients'); //栄養成分
            $table->text('storage_method');//保存方法
            $table->unsignedInteger('price');
            $table->text('expiration'); //賞味期限
            $table->text('additives')->nullable(); //添加物
            $table->text('allergy')->nullable();
            $table->text('origin')->nullable(); //原産地
            $table->text('nutrition_facts')->nullable(); //栄養成分
            $table->text('info')->nullable();
            $table->string('status')->nullable()->default(null);
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
