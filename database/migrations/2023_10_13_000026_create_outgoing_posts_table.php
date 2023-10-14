<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutgoingPostsTable extends Migration
{
    public function up()
    {
        Schema::create('outgoing_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->nullable();
            $table->decimal('cost', 15, 2)->nullable();
            $table->longText('notify')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
