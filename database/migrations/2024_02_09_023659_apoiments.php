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
        Schema::create('apoiments', function (Blueprint $table) {
            $table->id();
            $table->date('apoiment_date');
            
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');

            $table->unsignedBigInteger('nursing_saff_id');
            $table->foreign('nursing_saff_id')->references('id')->on('nursing_staff'); 

            $table->text('description', 250);
            $table->boolean('completed');
            $table->time('apoiment_hour');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};