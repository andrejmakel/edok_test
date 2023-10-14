<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model')->nullable();
            $table->string('ecv')->nullable();
            $table->string('vin')->nullable();
            $table->date('sk_register')->nullable();
            $table->date('stk_date')->nullable();
            $table->date('pzp_date')->nullable();
            $table->string('pzp_cislo')->nullable();
            $table->date('kasko_date')->nullable();
            $table->string('kasko_cislo')->nullable();
            $table->longText('poist_notice')->nullable();
            $table->timestamps();
        });
    }
}
