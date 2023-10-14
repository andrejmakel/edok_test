<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEPostsTable extends Migration
{
    public function up()
    {
        Schema::table('e_posts', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_7966250')->references('id')->on('teams');
            $table->unsignedBigInteger('sender_id')->nullable();
            $table->foreign('sender_id', 'sender_fk_7966251')->references('id')->on('senders');
            $table->unsignedBigInteger('zadal_id')->nullable();
            $table->foreign('zadal_id', 'zadal_fk_7966253')->references('id')->on('inputs');
            $table->unsignedBigInteger('dok_typ_id')->nullable();
            $table->foreign('dok_typ_id', 'dok_typ_fk_8148397')->references('id')->on('dok_typs');
        });
    }
}
