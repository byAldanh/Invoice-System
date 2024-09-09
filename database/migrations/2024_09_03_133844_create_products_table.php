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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // id -> increment unique value 
            $table->string('Product_name',999); // 999 the length of the string 
            $table->text('description')->nullable(); // it can be null 
            $table->unsignedBigInteger('section_id'); // it can't be negative -> accept big number 
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade'); // based on relation between the tables 
            /*
            section_id in that table will be a foregin key which is refers to the id in the sections table 
            with on delete cascade, means the the record in the primary key table deleted , also the record in this 
            table will be deleted. 
            */
            $table->timestamps();
        }); // the end of the create method 
    }// the end of the method 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }// the end of the method 
};// the end of the class return  
