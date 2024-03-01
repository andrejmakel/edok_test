<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZnackasTable extends Migration
{
    public function up()
    {
        Schema::create('znackas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('znacka')->nullable();
            $table->timestamps();
        });
    }
}
