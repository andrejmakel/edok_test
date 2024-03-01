<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('archive')->default(0)->nullable();
            $table->string('name')->nullable();
            $table->string('greeting')->nullable();
            $table->string('email')->nullable()->unique();
            $table->boolean('notifications')->default(0)->nullable();
            $table->datetime('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->boolean('approved')->default(0)->nullable();
            $table->string('remember_token')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('whats_app')->default(0)->nullable();
            $table->longText('notice')->nullable();
            $table->timestamps();
        });
    }
}
