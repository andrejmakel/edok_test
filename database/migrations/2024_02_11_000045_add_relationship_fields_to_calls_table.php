<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCallsTable extends Migration
{
    public function up()
    {
        Schema::table('calls', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_7962695')->references('id')->on('teams');
            $table->unsignedBigInteger('call_typ_id')->nullable();
            $table->foreign('call_typ_id', 'call_typ_fk_7962490')->references('id')->on('call_typs');
            $table->unsignedBigInteger('zadal_id')->nullable();
            $table->foreign('zadal_id', 'zadal_fk_7962487')->references('id')->on('inputs');
        });
    }
}
