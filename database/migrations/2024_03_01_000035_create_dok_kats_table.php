<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokKatsTable extends Migration
{
    public function up()
    {
        Schema::create('dok_kats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dok_kat')->nullable();
            $table->timestamps();
        });
    }
}
