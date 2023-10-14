<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLangsTable extends Migration
{
    public function up()
    {
        Schema::create('langs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lang')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
