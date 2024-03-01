<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCarsTable extends Migration
{
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_7962706')->references('id')->on('teams');
            $table->unsignedBigInteger('typ_id')->nullable();
            $table->foreign('typ_id', 'typ_fk_7962737')->references('id')->on('typs');
            $table->unsignedBigInteger('znacka_id')->nullable();
            $table->foreign('znacka_id', 'znacka_fk_7962738')->references('id')->on('znackas');
            $table->unsignedBigInteger('pzp_poistovna_id')->nullable();
            $table->foreign('pzp_poistovna_id', 'pzp_poistovna_fk_7962533')->references('id')->on('insurances');
            $table->unsignedBigInteger('kasko_poistovna_id')->nullable();
            $table->foreign('kasko_poistovna_id', 'kasko_poistovna_fk_7962534')->references('id')->on('insurances');
        });
    }
}
