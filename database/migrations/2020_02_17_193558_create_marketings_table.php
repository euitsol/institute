<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketingsTable extends Migration
{

    public function up()
    {
        Schema::create('marketings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('course');
            $table->string('mobile');
            $table->string('email');
            $table->string('address');
            $table->date('next_date');
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('marketings');
    }
}
