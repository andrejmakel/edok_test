<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueriesTable extends Migration
{
    public function up()
    {
        Schema::create('queries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_query')->nullable();
            $table->string('long_text')->nullable();
            $table->timestamps();
        });
    }
}
