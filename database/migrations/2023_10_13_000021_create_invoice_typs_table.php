<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTypsTable extends Migration
{
    public function up()
    {
        Schema::create('invoice_typs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shortcut')->nullable();
            $table->string('name')->nullable();
            $table->timestamps();
        });
    }
}
