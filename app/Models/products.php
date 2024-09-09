<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\sections;

class products extends Model
{
    use HasFactory;

    protected $fillable=[
        'Product_name',
        'description',
        'section_id'
    ];

    // Allow for all coulmns 
    protected $guarded=[];


  // Define the relationship
  public function sections()
  {
    // belongsTo -> means give me the thing that is not repeated
      return $this->belongsTo(sections::class, 'section_id');
      /*
      section_id -> the foregin key in the prodcuts table that 
      this references the id column in the sections table. It indicates which
      section each product belongs to.
      */
  }// the end of the method

}// the end of the class 
