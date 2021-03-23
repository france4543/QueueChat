<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('sex');
            $table->integer('age');
            $table->string('tel');
            $table->longText('profile')->nullable();
            $table->longText('images')->nullable();
            $table->string('shop_name')->unique()->nullable();
            $table->longText('shop_address')->nullable();
            $table->string('shop_type')->nullable();
            $table->longText('shop_detail')->nullable();
            $table->string('user_role');
            $table->string('status')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
