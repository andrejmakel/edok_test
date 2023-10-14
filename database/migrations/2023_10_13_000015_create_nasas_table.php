<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNasasTable extends Migration
{
    public function up()
    {
        Schema::create('nasas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('konto')->nullable();
            $table->string('iban')->nullable();
            $table->string('swift')->nullable();
            $table->timestamps();
        });
    }
}
