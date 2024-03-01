<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('call_user', function (Blueprint $table) {
            $table->unsignedBigInteger('call_id');
            $table->foreign('call_id', 'call_id_fk_9490864')->references('id')->on('calls')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_9490864')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
