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
        
        Schema::create('patients', function (Blueprint $table) {
            $table->id(); 
            $table->string('name',100);
            $table->string('surname',100);
            $table->string('email',50);
            $table->integer('phone_number');
            $table->string('user_type',50);
            $table->foreign('user_type')->references('id')->on('user_type');
            $table->string('password',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};