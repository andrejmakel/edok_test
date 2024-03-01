<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_7962678')->references('id')->on('teams');
            $table->unsignedBigInteger('sender_id')->nullable();
            $table->foreign('sender_id', 'sender_fk_7962439')->references('id')->on('senders');
            $table->unsignedBigInteger('post_form_id')->nullable();
            $table->foreign('post_form_id', 'post_form_fk_7962466')->references('id')->on('postforms');
            $table->unsignedBigInteger('zadal_id')->nullable();
            $table->foreign('zadal_id', 'zadal_fk_7962452')->references('id')->on('inputs');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_7962443')->references('id')->on('statuses');
            $table->unsignedBigInteger('customer_query_id')->nullable();
            $table->foreign('customer_query_id', 'customer_query_fk_7962448')->references('id')->on('queries');
            $table->unsignedBigInteger('processed_id')->nullable();
            $table->foreign('processed_id', 'processed_fk_7962464')->references('id')->on('processeds');
            $table->unsignedBigInteger('dok_typ_id')->nullable();
            $table->foreign('dok_typ_id', 'dok_typ_fk_8148396')->references('id')->on('dok_typs');
        });
    }
}
