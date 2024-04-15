<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('visible')->default(0)->nullable();
            $table->date('date');
            $table->string('number')->nullable();
            $table->string('name')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->date('payment_term')->nullable();
            $table->date('pay_date')->nullable();
            $table->date('accounting_date')->nullable();
            $table->date('send_email')->nullable();
            $table->boolean('paid')->default(0)->nullable();
            $table->timestamps();
        });
    }
}
