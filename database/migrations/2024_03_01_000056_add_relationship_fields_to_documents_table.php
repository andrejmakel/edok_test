<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDocumentsTable extends Migration
{
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_7962705')->references('id')->on('teams');
            $table->unsignedBigInteger('dok_typ_id')->nullable();
            $table->foreign('dok_typ_id', 'dok_typ_fk_8148394')->references('id')->on('dok_typs');
            $table->unsignedBigInteger('dok_kat_id')->nullable();
            $table->foreign('dok_kat_id', 'dok_kat_fk_8220998')->references('id')->on('dok_kats');
        });
    }
}
