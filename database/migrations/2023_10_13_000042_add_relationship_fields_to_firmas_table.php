<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFirmasTable extends Migration
{
    public function up()
    {
        Schema::table('firmas', function (Blueprint $table) {
            $table->unsignedBigInteger('nasa_id')->nullable();
            $table->foreign('nasa_id', 'nasa_fk_7962421')->references('id')->on('nasas');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_7962632')->references('id')->on('teams');
            $table->unsignedBigInteger('e_schranka_id')->nullable();
            $table->foreign('e_schranka_id', 'e_schranka_fk_7962412')->references('id')->on('e_schrankas');
            $table->unsignedBigInteger('spracovanie_id')->nullable();
            $table->foreign('spracovanie_id', 'spracovanie_fk_7962410')->references('id')->on('spracovanies');
            $table->unsignedBigInteger('ucto_id')->nullable();
            $table->foreign('ucto_id', 'ucto_fk_7962411')->references('id')->on('uctos');
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->foreign('bank_id', 'bank_fk_8908063')->references('id')->on('banks');
        });
    }
}
