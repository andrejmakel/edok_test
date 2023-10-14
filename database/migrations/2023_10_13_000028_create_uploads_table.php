<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadsTable extends Migration
{
    public function up()
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->nullable();
            $table->string('notice')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('accounting')->default(0)->nullable();
            $table->timestamps();
        });
    }
}
