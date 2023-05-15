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
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curriculum_vitae_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('ugg_form_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('work_title');
            $table->string('work_city');
            $table->string('work_employer');
            $table->date('work_start_date');
            $table->string('work_start_date_string');
            $table->date('work_end_date');
            $table->string('work_end_date_string');
            $table->string('work_description');
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
        Schema::dropIfExists('works');
    }
};
