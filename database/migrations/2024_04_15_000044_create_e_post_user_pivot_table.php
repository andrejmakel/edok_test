<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEPostUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('e_post_user', function (Blueprint $table) {
            $table->unsignedBigInteger('e_post_id');
            $table->foreign('e_post_id', 'e_post_id_fk_9490842')->references('id')->on('e_posts')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_9490842')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
