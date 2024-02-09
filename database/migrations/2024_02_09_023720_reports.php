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
        Schema::create('reports', function (Blueprint $table){
            $table->id();
            $table->date_time_set('report_date');
            $table->unsignedBigInteger('medicar_consultation_id');
            $table->foreign('medicar_consultation_id')->references('id')->on('medical_consultations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');

    }
};