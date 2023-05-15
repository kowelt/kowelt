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
        Schema::create('ugg_cities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ugg_session_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('name_en');
            $table->string('name_de');
            $table->string('name_fr');
            $table->boolean('active')->default(0);
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
        Schema::dropIfExists('ugg_cities');
    }
};
