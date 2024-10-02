<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DataTables;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalBelanja = 1;

        // Get the current month and last month
        $currentMonth = Carbon::now()->format('Y-m');
        $lastMonth = Carbon::now()->subMonth()->format('Y-m');

        // Query to get the totalBelanja for this month
        $totalThisMonth = 1;

        // Query to get the totalBelanja for last month
        $totalLastMonth = 1;
        $session = $totalThisMonth/$totalLastMonth*100;

        return view('base.motor', compact('totalBelanja', 'session'));

        // $totalBelanja = Belanja::sum('totalBelanja');

        // // Get the current month and last month
        // $currentMonth = Carbon::now()->format('Y-m');
        // $lastMonth = Carbon::now()->subMonth()->format('Y-m');

        // // Query to get the totalBelanja for this month
        // $totalThisMonth = Belanja::where(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"), $currentMonth)
        //     ->sum('totalBelanja');

        // // Query to get the totalBelanja for last month
        // $totalLastMonth = Belanja::where(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"), $lastMonth)
        //     ->sum('totalBelanja');
        // $session = $totalThisMonth/$totalLastMonth*100;

        // return view('base.belanja', compact('totalBelanja', 'session'));
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
    public function show(Motor $motor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Motor $motor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Motor $motor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Motor $motor)
    {
        //
    }
}
