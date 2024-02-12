<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirmasTable extends Migration
{
    public function up()
    {
        Schema::create('firmas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nazov')->nullable();
            $table->boolean('activ')->default(0)->nullable();
            $table->string('idmmc')->nullable();
            $table->string('id_pohoda')->nullable();
            $table->string('address')->nullable();
            $table->string('short_address')->nullable();
            $table->string('ico')->nullable();
            $table->string('dic')->nullable();
            $table->string('ic_dph')->nullable();
            $table->string('ic_dph_form')->nullable();
            $table->string('telefon')->nullable();
            $table->string('sprac_posty')->nullable();
            $table->string('iban')->nullable();
            $table->string('swift_bic')->nullable();
            $table->longText('popis')->nullable();
            $table->timestamps();
        });
    }
}
