<?php

namespace App\Http\Controllers;

use App\Models\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreResponse;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections=sections::all(); // get all the records from the sections table 
        return view('sections.sections',compact('sections')); // view the sections file in the sections folder, compact to move the data also  
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
    public function store(StoreResponse $request)
    {
        // As the validation in the same method

        // // Validation 
        // $validationData=$request->validate([
        //     'section_name'=>'required|unique:sections|max:255',
        //     'description'=>'required',
        // ],[

        //     'section_name.required'=>'يرجى ادخال اسم القسم ',
        //     'section_name.unique'=>'اسم القسم مسجل مسبقا',
        //     'description.required'=>'يرجى ادخال اسم الوصف ',
        // ]);

        
        // $validatedData = $request->validate([
        //     'section_name' => 'required|unique:sections|max:255',
        //     'description' => 'required',
        // ],[

        //     'section_name.required' =>'يرجي ادخال اسم القسم',
        //     'section_name.unique' =>'اسم القسم مسجل مسبقا',
        //     'description.required' =>'يرجي ادخال البيان',

        // ]);

            sections::create([
                'section_name' => $request->section_name,
                'description' => $request->description,
                'created_by' => (Auth::user()->name),

            ]);
            session()->flash('Add', 'تم اضافة القسم بنجاح ');
            return redirect('/sections');


        // Another way for the validation 
        // $inputData=$request->all(); // get all the data within the request 

        // // check whether the 'section_name' that has been entered is exists in the 'sections' table or not 
        // $name_exists=sections::where('section_name','=',$inputData['section_name'])->exists(); 
        
        // if($name_exists) // if it already exists in the table 
        // {
        //     // create a session, 
        //     session()->flash('Error', 'خطأ القسم مسجل مسبقا');
        //     return redirect('/sections'); 

        // }// the end of the if statment 
        // else {
        //     // if it doesn't exists 
        //     sections::create([
        //         'section_name'=>$request['section_name'], 
        //         'description'=>$request['description'],
        //         'created_by'=>(Auth::user()->name),
        //     ]); // the end of the create method 
        // }// the end of the else statment 

        // session()->flash('Add', 'تم اضافه القسم بنجاح');
        // return redirect('/sections');
        
    }// the end of the method

    /**
     * Display the specified resource.
     */
    public function show(sections $sections)
    {
        //
    }// the end of the method

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sections $sections)
    {
        //
    }// the end of the method

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // get the id from the request of the specific record 
        $id=$request->id;

        // validate the input in the request
        $this->validate($request,[
            /*
            if the name of the section_name didn't change it will be OK, (check with its id)
            */
            //'section_name'=>'required|regex:/^[A-Za-z0-9-ي-أ-pL\s\-]+$/u|max:255|unique:sections'.$id,
            'section_name'=>'required|unique:sections|max:255'.$id,
            'description'=>'required'
        ],[
            'section_name.required'=>'يرجى ادخال اسم القسم ',
            'section_name.regex'=>'القيمه المدخله في الوصف خطأ',
            'section_name.unique'=>'اسم القسم مسجل مسبقا',
            'description.required'=>'يرجى ادخال اسم الوصف ',
    ]);

        // get the record using the id in the request ... 
       $section=sections::find($id);
       $section->update([
        'section_name'=>$request->section_name,
        'description'=>$request->description
       ]);

       //used to store a temporary session variable that will be available for the next request onl
       session()->flash('edit','تم تعديل القسم بنجاح ');
       return redirect('/sections'); // قثفعقر فخ فاث ذثسفهخرس زمشيث 

    }// the end of the method

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        sections::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/sections');


    }// the end of the method

    
} // the end of the class 
