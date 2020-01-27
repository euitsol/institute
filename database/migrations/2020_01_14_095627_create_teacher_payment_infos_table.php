<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherPaymentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_payment_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('institute_id');
            $table->unsignedInteger('teacher_id')->nullable();
            $table->string('responsible_teacher_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('phone')->nullable();
            $table->year('year');
            $table->decimal('per_student_payment', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_payment_infos');
    }
}
