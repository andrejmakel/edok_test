<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->nullable();
            $table->string('title')->nullable();
            $table->string('document_code')->nullable();
            $table->longText('notice')->nullable();
            $table->string('file_short_text')->nullable();
            $table->string('payment_info')->nullable();
            $table->boolean('accounting')->default(0)->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->string('iban')->nullable();
            $table->string('swift')->nullable();
            $table->string('vs')->nullable();
            $table->string('ss')->nullable();
            $table->string('ks')->nullable();
            $table->date('paid')->nullable();
            $table->date('due_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
