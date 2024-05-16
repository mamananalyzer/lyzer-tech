<?php

namespace App\Http\Controllers;

use App\Models\Belanja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BelanjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalBelanja = Belanja::sum('totalBelanja');

        // Get the current month and last month
        $currentMonth = Carbon::now()->format('Y-m');
        $lastMonth = Carbon::now()->subMonth()->format('Y-m');

        // Query to get the totalBelanja for this month
        $totalThisMonth = Belanja::where(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"), $currentMonth)
            ->sum('totalBelanja');

        // Query to get the totalBelanja for last month
        $totalLastMonth = Belanja::where(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"), $lastMonth)
            ->sum('totalBelanja');
        $session = $totalThisMonth/$totalLastMonth*100;

        return view('base.belanja', compact('totalBelanja', 'session'));
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
            'jenisBelanja' => 'required',
            'komponen' => 'required|array',
            'totalBelanja' => 'required',
        ]);

        // Convert the array of selected components to a string
        $keteranganBarang = implode(', ', $validatedData['komponen']);

        // Create a new User instance
        $belanja = Belanja::create([
            'jenisBelanja' => $validatedData['jenisBelanja'],
            'keteranganBarang' => $keteranganBarang,
            'totalBelanja' => $validatedData['totalBelanja'],
        ]);
        
        $belanja->save();

        return redirect('/belanja')->with('success', 'Form submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Belanja $belanja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Belanja $belanja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Belanja $belanja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Belanja $belanja)
    {
        //
    }
}
