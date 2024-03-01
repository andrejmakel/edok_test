<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(0)->nullable();
            $table->boolean('archive')->default(0)->nullable();
            $table->string('nazov')->nullable();
            $table->string('short_name')->nullable();
            $table->string('superfaktura')->nullable();
            $table->integer('id_mmc')->nullable();
            $table->string('id_pohoda')->nullable();
            $table->date('date')->nullable();
            $table->string('address')->nullable();
            $table->string('ico')->nullable();
            $table->string('dic')->nullable();
            $table->string('ic_dph')->nullable();
            $table->boolean('ic_dph_7_a')->default(0)->nullable();
            $table->string('phone')->nullable();
            $table->string('send_address')->nullable();
            $table->string('iban')->nullable();
            $table->string('swift_bic')->nullable();
            $table->longText('popis')->nullable();
            $table->timestamps();
        });
    }
}
