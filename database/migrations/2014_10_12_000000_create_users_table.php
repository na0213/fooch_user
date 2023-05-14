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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_pronunciation')->nullable();
            $table->string('tel');
            $table->string('zipcode');
            $table->string('prefecture');
            $table->string('city');
            $table->string('email')->unique();
            $table->datetime('email_verified_at')->nullable();
            $table->string('email_verify_token')->nullable();
            $table->integer('birth_year')->nullable();
            $table->integer('birth_month')->nullable();
            $table->integer('birth_day')->nullable();
            $table->string('password');
            $table->string('stripe_id')->unique()->nullable()->comment('クレカ情報はstripe側が保持');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
