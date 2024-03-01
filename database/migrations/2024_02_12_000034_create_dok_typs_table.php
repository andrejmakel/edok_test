<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokTypsTable extends Migration
{
    public function up()
    {
        Schema::create('dok_typs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dok_typ_sk')->nullable();
            $table->string('dok_typ_de')->nullable();
            $table->string('dok_typ_en')->nullable();
            $table->timestamps();
        });
    }
}
