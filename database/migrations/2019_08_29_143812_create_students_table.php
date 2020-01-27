<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reg_no');
            $table->string('name', 191);
            $table->string('fathers_name', 191);
            $table->string('mothers_name', 191);
            $table->text('photo')->nullable();
            $table->text('present_address');
            $table->text('permanent_address');
            $table->date('dob');
            $table->string('gender', 10);
            $table->unsignedInteger('institute_id')->nullable();
            $table->string('board_roll', 10)->nullable();
            $table->string('board_reg', 10)->nullable();
            $table->string('phone', 15);
            $table->string('parents_phone', 15)->nullable();
            $table->string('email', 30)->nullable();
            $table->string('nationality', 50)->nullable();
            $table->string('nid', 25)->nullable();
            $table->string('birth', 25)->nullable();
            $table->string('blood_group', 5)->nullable();
            $table->text('emergency_contact_name')->nullable();
            $table->text('emergency_contact_relation')->nullable();
            $table->text('emergency_contact_address')->nullable();
            $table->text('emergency_contact_phone')->nullable();
            $table->string('student_as', 191);
            $table->string('district')->nullable();
            $table->year('year');
            $table->longText('note')->nullable();
            $table->text('career_info')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('institute_id')->references('id')->on('institutes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
