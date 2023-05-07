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
        Schema::create('exclusion_product', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedBigInteger('exclusion_id');

            $table->foreignId('product_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');

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
        Schema::dropIfExists('exclusion_product');
    }
};
