<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUctosTable extends Migration
{
    public function up()
    {
        Schema::create('uctos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uctuje')->nullable();
            $table->string('tel')->nullable();
            $table->string('mobil')->nullable();
            $table->string('email')->nullable();
            $table->longText('poznamka')->nullable();
            $table->timestamps();
        });
    }
}
