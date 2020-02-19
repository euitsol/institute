<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketingcommentsTable extends Migration
{

    public function up()
    {
        Schema::create('marketingcomments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('marketing_id')->index();
            $table->date('date');
            $table->string('converse_with');
            $table->text('comment');
            $table->integer('added_by')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('marketingcomments');
    }
}
