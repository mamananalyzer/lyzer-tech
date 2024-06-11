<?php

namespace App\Http\Controllers;

use App\Models\Labs_Label;
use Illuminate\Http\Request;

class Labs_LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // Handle form submission logic here
        $validatedData = $request->validate([
            'brand' => 'required',
            'customer' => 'required',
            'PO' => 'required',
            'type' => 'required',
            'qty' => 'required',
            'scale' => 'required',
            'input' => 'required',
        ]);

        // Create a new User instance
        $label = Labs_Label::create([
            'brand' => $validatedData['brand'],
            'customer' => $validatedData['customer'],
            'PO' => $validatedData['PO'],
            'type' => $validatedData['type'],
            'qty' => $validatedData['qty'],
            'scale' => $validatedData['scale'],
            'input' => $validatedData['input'],
        ]);
        
        $label->save();

        return redirect('/Labs')->with('success', 'Form submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Labs_Label $labs_Label)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Labs_Label $labs_Label)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Labs_Label $labs_Label)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Labs_Label $labs_Label)
    {
        //
    }
}
