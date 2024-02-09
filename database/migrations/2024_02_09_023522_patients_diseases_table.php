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
        Schema::create('patients_diseases_table', function (Blueprint $table) {
            $table->date('disease_date');
            $table->unsignedBigInteger('patient_id',50);
            $table->foreign('patient_id')->references('id')->on('patientss');
            
            $table->unsignedBigInteger('disease_id',50);
            $table->foreign('disease_id')->references('id')->on('diseases');
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients_diseases_table');

    }
};