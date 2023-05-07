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
        Schema::create('store_application_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('store_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('zipcode')->nullable();
            $table->string('prefecture')->nullable();
            $table->string('city')->nullable();
            $table->string('tel')->nullable();
            $table->text('info')->nullable();
            $table->string('logo')->nullable();
            $table->string('image')->nullable();
            $table->string('comment')->nullable();
            $table->string('status')->nullable()->default(null);
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
        Schema::dropIfExists('store_application_histories');
    }
};
