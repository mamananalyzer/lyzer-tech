<?php

namespace App\Http\Controllers;

use App\Models\HSE;
use Illuminate\Http\Request;

class HSEController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hse = HSE::all();
        return view('base.hse', compact('hse'));
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
    public function show(HSE $hSE)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HSE $hSE)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HSE $hSE)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HSE $hSE)
    {
        //
    }
}
