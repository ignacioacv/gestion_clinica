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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id(); 
            $table->string('name',100);
            $table->string('surname',100);
            $table->string('email',50);
            $table->integer('phone_number');
            $table->unsignedBigInteger('doctor_state');
            $table->foreign('doctor_state')->references('id')->on('states');
            $table->string('password',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');

    }
};