<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\products;

class sections extends Model
{
    use HasFactory;

    protected $fillable=[
        'section_name',
        'description',
        'created_by'
    ];// the end of the array s


    // Define the inverse relationship
    public function products()
    {
        /*
        products::class -> tells laravel that this model 
        can have multiple associated products records
        */
        return $this->hasMany(products::class, 'section_id');
        /*
        section_id-> This is the foreign key in the products table that 
        links back to the sections table
        */

    }// the end of the method
}// the end of the class 
