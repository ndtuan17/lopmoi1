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
        // Schema::create('classes', function (Blueprint $table) {
        //     $table->id();

        //     $table->unsignedBigInteger('center_id');
        //     $table->unsignedBigInteger('subject_id');
        //     $table->unsignedBigInteger('grade_id');
        //     $table->unsignedBigInteger('student_gender_id');
        //     $table->unsignedBigInteger('student_level_id');
        //     $table->text('student_level_detail');
        //     $table->string('commune_id', 5)->charset('utf8mb4_general_ci');
        //     $table->text('address');

        //     $table->unsignedBigInteger('shift');
        //     $table->unsignedBigInteger('salary');
        //     $table->unsignedBigInteger('fee_percent');

        //     $table->text('class_detail');

        //     $table->unsignedBigInteger('tutor_type_id');
        //     $table->unsignedBigInteger('tutor_gender_id');
        //     $table->text('tutor_detail');

        //     $table->text('source_link');
        //     $table->string('code');

        //     $table->timestamps();

        //     $table->foreign('center_id')->references('id')->on('centers')->onDelete('cascade');
        //     $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
        //     $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
        //     $table->foreign('student_gender_id')->references('id')->on('student_genders')->onDelete('cascade');
        //     $table->foreign('student_level_id')->references('id')->on('student_levels')->onDelete('cascade');
        //     $table->foreign('commune_id')->references('id')->on('communes')->onDelete('cascade');
        //     $table->foreign('tutor_type_id')->references('id')->on('tutor_types')->onDelete('cascade');
        //     $table->foreign('tutor_gender_id')->references('id')->on('tutor_genders')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classes');
    }
};
