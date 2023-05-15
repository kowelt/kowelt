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
        Schema::create('curriculum_vitaes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('tel');
            $table->string('street_and_number');
            $table->integer('postal_code');
            $table->string('city');
            $table->string('country');
//            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('nationality');
//            $table->string('gender');
            $table->string('martial_status')->nullable();
            $table->boolean('driving_licence')->default(0);
            $table->string('driving_licence_category')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('other_description')->nullable();
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
        Schema::dropIfExists('curriculum_vitaes');
    }
};
