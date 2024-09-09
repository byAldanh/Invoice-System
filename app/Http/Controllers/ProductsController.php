<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use App\Models\sections;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections=sections::all(); // get all the records from the sections table 
        $products=products::all(); // get all the records from the products table 
        // move to the products page with the sections records 
         
        return view('products.products', compact('sections','products'));
    }// the end of the method

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }// the end of the method

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        // the section record, by using the section_id from the request
        products::create([
            'Product_name'=>$request->Product_name,
            'section_id'=>$request->section_id,
            'description'=>$request->description,
        ]);
        session()->flash('Add','تم اضافه المنتج بنجاح ');
        return redirect('/products'); // قثفعقر فخ فاث ذثسفهخرس زمشيث 

    }// the end of the method

    /**
     * Display the specified resource.
     */
    public function show(products $products)
    {
        //
    }// the end of the method

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(products $products)
    {
        //
    }// the end of the method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        return $request;
    }// the end of the method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(products $products)
    {
        //
    }// the end of the method
}// the end of the class 
