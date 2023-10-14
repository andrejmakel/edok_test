<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nazov')->nullable();
            $table->string('short_name')->nullable();
            $table->boolean('activ')->default(0)->nullable();
            $table->date('date')->nullable();
            $table->string('mmc')->nullable();
            $table->timestamps();
        });
    }
}
