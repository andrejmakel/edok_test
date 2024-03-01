<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUctosTable extends Migration
{
    public function up()
    {
        Schema::table('uctos', function (Blueprint $table) {
            $table->unsignedBigInteger('acc_company_id')->nullable();
            $table->foreign('acc_company_id', 'acc_company_fk_9547843')->references('id')->on('acc_companies');
        });
    }
}
