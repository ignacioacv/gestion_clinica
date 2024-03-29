<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medical_consultations', function (Blueprint $table){
            $table->id();

            $table->unsignedBigInteger('apoiment_id');
            $table->foreign('apoiment_id')->references('id')->on('apoiments');

            $table->dateTime('medical_consultation_date');
            $table->text('description', 250);

            $table->dateTime('start_date');
            $table->dateTime('end_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apoimedical_consultations');
    }
};
