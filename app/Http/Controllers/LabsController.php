<?php

namespace App\Http\Controllers;

use App\Models\Labs;
use Illuminate\Http\Request;

class LabsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $Labs = Labs::all();
        return view('base.labs'
            // , compact('Labs')
        );
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Labs $labs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Labs $labs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Labs $labs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Labs $labs)
    {
        //
    }
}
