<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpracovaniesTable extends Migration
{
    public function up()
    {
        Schema::create('spracovanies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('popis')->nullable();
            $table->string('popis_de')->nullable();
            $table->string('popis_en')->nullable();
            $table->timestamps();
        });
    }
}
