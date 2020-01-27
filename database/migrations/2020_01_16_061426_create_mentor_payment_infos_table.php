<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMentorPaymentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentor_payment_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mentor_id');
            $table->string('mentor_name')->nullable();
            $table->string('mentor_phone')->nullable();
            $table->string('email')->nullable();
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('batch_id');
            $table->year('year');
            $table->integer('total_class')->nullable();
            $table->decimal('per_class_payment', 10, 2)->nullable();
            $table->decimal('batch_wise_payment', 10, 2)->nullable();
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
        Schema::dropIfExists('mentor_payment_infos');
    }
}
