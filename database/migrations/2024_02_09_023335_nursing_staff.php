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
        Schema::create('nursing_staff', function (Blueprint $table) {
            $table->id(); 
            $table->string('name',100);
            $table->string('surname',100);
            $table->integer('phone_number');
            $table->string('email',50);
            $table->string('designated_area',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nursing_staff');
    }
};