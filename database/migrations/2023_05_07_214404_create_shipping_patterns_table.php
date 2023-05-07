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
        Schema::create('shipping_patterns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('shipping_name');
            $table->unsignedInteger('hokkaido_fee')->nullable();
            $table->unsignedInteger('shipping_ktohoku')->nullable();
            $table->unsignedInteger('ktohoku_fee')->nullable();
            $table->unsignedInteger('mtohoku_fee')->nullable();
            $table->unsignedInteger('kanto_fee')->nullable();
            $table->unsignedInteger('shinetsu_fee')->nullable();
            $table->unsignedInteger('hokuriku_fee')->nullable();
            $table->unsignedInteger('tyubu_fee')->nullable();
            $table->unsignedInteger('kansai_fee')->nullable();
            $table->unsignedInteger('tyugoku_fee')->nullable();
            $table->unsignedInteger('shikoku_fee')->nullable();
            $table->unsignedInteger('kyushu_fee')->nullable();
            $table->unsignedInteger('okinawa_fee')->nullable();
            $table->datetime('created_at');
            $table->datetime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipping_patterns');
    }
};
