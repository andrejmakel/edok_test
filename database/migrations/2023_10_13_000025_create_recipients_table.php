<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipientsTable extends Migration
{
    public function up()
    {
        Schema::create('recipients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('street_nr')->nullable();
            $table->string('psc')->nullable();
            $table->string('mesto_sk')->nullable();
            $table->string('mesto_de')->nullable();
            $table->timestamps();
        });
    }
}
