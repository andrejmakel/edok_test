<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('post_nr')->nullable();
            $table->string('title')->nullable();
            $table->string('file_short_text')->nullable();
            $table->longText('notice')->nullable();
            $table->boolean('accounting')->default(0)->nullable();
            $table->date('status_date')->nullable();
            $table->string('customer_notice')->nullable();
            $table->date('processed_at')->nullable();
            $table->boolean('send_email')->default(0)->nullable();
            $table->string('payment_info')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->string('iban')->nullable();
            $table->string('swift')->nullable();
            $table->string('vs')->nullable();
            $table->string('ss')->nullable();
            $table->string('ks')->nullable();
            $table->string('for_recipient')->nullable();
            $table->date('paid')->nullable();
            $table->date('due_date')->nullable();
            $table->timestamps();
        });
    }
}
