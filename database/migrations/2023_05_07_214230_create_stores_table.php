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
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('owner_id')
            ->constrained('owners')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('name');
            $table->text('info')->nullable();
            $table->string('logo')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('stores');
    }
};
