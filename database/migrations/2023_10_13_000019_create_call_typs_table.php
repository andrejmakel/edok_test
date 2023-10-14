<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallTypsTable extends Migration
{
    public function up()
    {
        Schema::create('call_typs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('call_typ')->nullable();
            $table->timestamps();
        });
    }
}
