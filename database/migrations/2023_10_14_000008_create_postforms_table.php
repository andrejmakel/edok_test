<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostformsTable extends Migration
{
    public function up()
    {
        Schema::create('postforms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('postform_sk')->nullable();
            $table->string('postform_icon')->nullable();
            $table->timestamps();
        });
    }
}
