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
            $table->boolean('accounting')->default(0)->nullable();
            $table->boolean('archive')->default(0)->nullable();
            $table->boolean('closed')->default(0)->nullable();
            $table->date('date');
            $table->string('notice')->nullable();
            $table->longText('description')->nullable();
            $table->longText('reply')->nullable();
            $table->timestamps();
        });
    }
}
