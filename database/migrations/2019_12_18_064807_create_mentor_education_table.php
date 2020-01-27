<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMentorEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentor_education', function (Blueprint $table) {
            $table->increments('id');
            $table->text('exam_title');
            $table->text('major')->nullable();
            $table->text('institute')->nullable();
            $table->text('result')->nullable();
            $table->string('passing_year', 10)->nullable();
            $table->string('duration', 10);
            $table->unsignedInteger('mentor_id');
            $table->timestamps();

            $table->foreign('mentor_id')->references('id')
                ->on('mentors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mentor_education');
    }
}
