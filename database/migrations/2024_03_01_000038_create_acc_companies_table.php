<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('acc_companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('acc_company')->nullable();
            $table->timestamps();
        });
    }
}
