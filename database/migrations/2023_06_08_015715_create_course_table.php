<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->id();
            $table->char('title', 100);
            $table->char('crscode', 20);
            $table->char('term_name', 20);
            $table->bigInteger('dept_id');
            $table->bigInteger('level_id');
            $table->bigInteger('instructor_id');

            $table->foreign('dept_id')->references('id')->on('department');
            $table->foreign('level_id')->references('id')->on('level');
            $table->foreign('instructor_id')->references('id')->on('instructor');
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
        Schema::dropIfExists('course');
    }
};
