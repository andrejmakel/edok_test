<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status')->nullable();
            $table->string('status_icon')->nullable();
            $table->string('title_de')->nullable();
            $table->string('title_sk')->nullable();
            $table->string('title_en')->nullable();
            $table->timestamps();
        });
    }
}
