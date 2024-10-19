<?php

namespace App\Http\Controllers;

use App\Models\Quickpin;
use Illuminate\Http\Request;

class QuickpinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('base.quickpin'
        // , compact('totalBelanja', 'session')
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
    public function show(Quickpin $quickpin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quickpin $quickpin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quickpin $quickpin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quickpin $quickpin)
    {
        //
    }
}
