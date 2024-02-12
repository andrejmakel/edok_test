<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirmaUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('firma_user', function (Blueprint $table) {
            $table->unsignedBigInteger('firma_id');
            $table->foreign('firma_id', 'firma_id_fk_8223191')->references('id')->on('firmas')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_8223191')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
