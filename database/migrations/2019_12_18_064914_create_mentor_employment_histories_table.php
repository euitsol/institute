<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMentorEmploymentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentor_employment_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->text('office_name');
            $table->text('address');
            $table->text('designation');
            $table->text('responsibility');
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->unsignedInteger('mentor_id');
            $table->timestamps();

            $table->foreign('mentor_id')->references('id')->on('mentors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mentor_employment_histories');
    }
}
