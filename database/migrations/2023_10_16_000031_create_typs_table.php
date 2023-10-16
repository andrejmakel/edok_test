<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypsTable extends Migration
{
    public function up()
    {
        Schema::create('typs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('typ_sk')->nullable();
            $table->string('typ_de')->nullable();
            $table->string('typ_en')->nullable();
            $table->timestamps();
        });
    }
}
