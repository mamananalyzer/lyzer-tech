<?php

namespace App\Http\Controllers;

use App\Models\CRM;
use App\Models\User;
use Illuminate\Http\Request;

class CRMController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = User::where('role_id', 1)->get();
        return view('base.CRM', compact('sales'));
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
    public function show(CRM $cRM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CRM $cRM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CRM $cRM)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CRM $cRM)
    {
        //
    }
}
