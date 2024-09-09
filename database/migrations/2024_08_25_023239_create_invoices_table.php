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
        Schema::create('invoices', function (Blueprint $table) {
            //$table->increments('id'); // increment number (primery key)
            $table->id();// the default id method 
            $table->string('invoice_number'); // the default string 255 characters
            $table->date('invoice_date');
            $table->date('due_date');
            $table->string('product');
            $table->string('section');
            $table->string('discount');
            $table->string('rate_vat');
            $table->decimal('value_vat',8,2); // total number 8, after the decimal there is 2 digits
            $table->decimal('total',8,2);
            $table->string('status',50); // 50 length ( number of characters )
            $table->integer('value_status'); // paied nvoice -> 1, .....
            $table->text('note')->nullable(); // more than the string length
            $table->string('user');
            $table->softDeletes(); // delete without losing valuable information (EX: archive)
            $table->timestamps(); //created at - updated at 
        });
    }// the end of the method 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::dropIfExists('invoices');
    }// the end of the method

};// the end of the class 
