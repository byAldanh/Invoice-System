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
        Schema::create('sections', function (Blueprint $table) {
            $table->id(); // it will be incremented 
            $table->string('section_name',999); // 999 -> Refers to the maximum length of the section name 
            $table->text('description')->nullable(); 
            $table->string('created_by',999);
            $table->timestamps();
        });
    }// the end of the method 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }// the end of the method 
};
