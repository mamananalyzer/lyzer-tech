<?php

namespace App\Http\Controllers;

use App\Models\Zerotest;
use Illuminate\Http\Request;

class ZerotestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Example data to pass to ECharts
        $chartData = [
            'xAxis' => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            'data' => [120, 200, 150, 80, 70, 110, 130],
        ];

        return view('base.zerotest', compact('chartData'));
    }

    public function getDataAndCompare()
    {

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
    public function show(Zerotest $zerotest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Zerotest $zerotest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Zerotest $zerotest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zerotest $zerotest)
    {
        //
    }
}
