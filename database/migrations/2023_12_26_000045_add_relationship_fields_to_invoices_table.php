<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInvoicesTable extends Migration
{
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_7962774')->references('id')->on('teams');
            $table->unsignedBigInteger('nasa_id')->nullable();
            $table->foreign('nasa_id', 'nasa_fk_7962510')->references('id')->on('nasas');
            $table->unsignedBigInteger('typ_id')->nullable();
            $table->foreign('typ_id', 'typ_fk_7962512')->references('id')->on('invoice_typs');
        });
    }
}
