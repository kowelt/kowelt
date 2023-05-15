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
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curriculum_vitae_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('ugg_form_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('education_degree');
            $table->string('education_city');
            $table->string('education_institut');
            $table->date('education_start_date');
            $table->string('education_start_date_string');
            $table->date('education_end_date');
            $table->string('education_end_date_string');
            $table->string('education_description');
            $table->integer('position')->nullable();
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
        Schema::dropIfExists('educations');
    }
};
