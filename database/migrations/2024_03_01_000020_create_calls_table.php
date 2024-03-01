<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallsTable extends Migration
{
    public function up()
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('date_time');
            $table->integer('duration')->nullable();
            $table->string('name')->nullable();
            $table->string('company')->nullable();
            $table->string('call_nr')->nullable();
            $table->string('short_notice')->nullable();
            $table->longText('notice')->nullable();
            $table->date('send_email')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
