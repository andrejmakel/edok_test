<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTeamsTable extends Migration
{
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->unsignedBigInteger('nasa_id')->nullable();
            $table->foreign('nasa_id', 'nasa_fk_9547663')->references('id')->on('nasas');
            $table->unsignedBigInteger('sidlo_id')->nullable();
            $table->foreign('sidlo_id', 'sidlo_fk_9547837')->references('id')->on('sidlos');
            $table->unsignedBigInteger('e_schranka_id')->nullable();
            $table->foreign('e_schranka_id', 'e_schranka_fk_9547675')->references('id')->on('e_schrankas');
            $table->unsignedBigInteger('spracovanie_id')->nullable();
            $table->foreign('spracovanie_id', 'spracovanie_fk_9547676')->references('id')->on('spracovanies');
            $table->unsignedBigInteger('acc_company_id')->nullable();
            $table->foreign('acc_company_id', 'acc_company_fk_9547844')->references('id')->on('acc_companies');
            $table->unsignedBigInteger('ucto_id')->nullable();
            $table->foreign('ucto_id', 'ucto_fk_9547678')->references('id')->on('uctos');
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->foreign('bank_id', 'bank_fk_9547679')->references('id')->on('banks');
        });
    }
}
