<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSidlosTable extends Migration
{
    public function up()
    {
        Schema::create('sidlos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sidlo')->nullable();
            $table->timestamps();
        });
    }
}
