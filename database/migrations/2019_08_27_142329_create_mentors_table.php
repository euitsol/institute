<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMentorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191);
            $table->string('fathers_name', 191);
            $table->string('mothers_name', 191);
            $table->string('phone', 15);
            $table->string('email', 30);
            $table->string('parents_phone', 15)->nullable();
            $table->string('nid', 25)->nullable();
            $table->text('present_address');
            $table->text('permanent_address')->nullable();
            $table->text('photo')->nullable();
            $table->longText('career_objective')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('mentors');
    }
}
