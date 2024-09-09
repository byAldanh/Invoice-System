<?php

namespace App\Http\Controllers;

use App\Models\invoices; // call the invoices model 
use Illuminate\Http\Request;

// Controller created with the basic methods in it 
class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('invoices.invoices');
    } // the end of the method 

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
        //
    }// the end of the method 

    /**
     * Display the specified resource.
     */
    public function show(invoices $invoices)
    {
        //
    }// the end of the method 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(invoices $invoices)
    {
        //
    }// the end of the method 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, invoices $invoices)
    {
        //
    }// the end of the method 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(invoices $invoices)
    {
        //
    }// the end of the method 
}// the end of the class 
