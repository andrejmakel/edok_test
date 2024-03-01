<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOutgoingPostsTable extends Migration
{
    public function up()
    {
        Schema::table('outgoing_posts', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_7962679')->references('id')->on('teams');
            $table->unsignedBigInteger('recipient_id')->nullable();
            $table->foreign('recipient_id', 'recipient_fk_7962551')->references('id')->on('recipients');
        });
    }
}
