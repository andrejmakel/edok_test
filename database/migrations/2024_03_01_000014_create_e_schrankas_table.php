<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateESchrankasTable extends Migration
{
    public function up()
    {
        Schema::create('e_schrankas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('splnomocnenec')->nullable();
            $table->timestamps();
        });
    }
}
