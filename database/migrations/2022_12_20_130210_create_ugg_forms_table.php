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
        Schema::create('ugg_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('session');
            $table->string('ugg_city');
            $table->string('exam_language');
            $table->string('place_of_birth');
            $table->string('nationality');
            $table->string('identity_number');
            $table->string('leaving_city');
            $table->string('tel');
            $table->string('last_degree');
            $table->string('last_degree_other')->nullable();
            $table->string('last_degree_school');
            $table->string('last_degree_serie')->nullable();
            $table->string('last_degree_study')->nullable();
            $table->string('last_degree_study_other')->nullable();
            $table->boolean('currently_student')->default(0);
            $table->string('student_school')->nullable();
            $table->string('student_cycle')->nullable();
            $table->string('student_cycle_other')->nullable();
            $table->string('student_field')->nullable();
            $table->string('student_field_other')->nullable();
            $table->boolean('currently_apprentice')->default(0);
            $table->string('apprentice_field')->nullable();
//            $table->string('apprentice_field_other')->nullable();
            $table->string('other_education')->nullable();
            $table->boolean('professional_experience')->default(0);
            $table->boolean('job_seeker')->default(0);
            $table->string('job_seeker_field')->nullable();
            $table->string('other_experience')->nullable();
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
        Schema::dropIfExists('ugg_forms');
    }
};
