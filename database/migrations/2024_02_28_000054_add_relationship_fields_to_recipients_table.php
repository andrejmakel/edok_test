<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRecipientsTable extends Migration
{
    public function up()
    {
        Schema::table('recipients', function (Blueprint $table) {
            $table->unsignedBigInteger('stat_id')->nullable();
            $table->foreign('stat_id', 'stat_fk_7962548')->references('id')->on('stats');
        });
    }
}
