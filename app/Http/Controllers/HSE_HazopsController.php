<?php

namespace App\Http\Controllers;

use App\Models\HSE_Hazops;
use Illuminate\Http\Request;
use DataTables;

class HSE_HazopsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $HSE_Hazops = HSE_Hazops::all();

        // dd($HSE_Hazops);

        return view('base.HSE_Hazops');
    }

    public function getData()
    {
        // $users = Belanja::select(['id_product', 'jenisBelanja', 'keteranganBarang', 'totalBelanja', 'created_at']);

        // $belanja = Belanja::whereMonth('created_at', Carbon::now()->month)->get();
        $HSE_Hazops = HSE_Hazops::all();

        // dd($belanja);

        return DataTables::of($HSE_Hazops)
            ->editColumn('created_at', function ($HSE_Hazops) {
                return $HSE_Hazops->created_at->format('Y-m-d H:i');
            })
            ->addColumn('action', function($HSE_Hazops) {
                return '<a href="/edit/'.$HSE_Hazops->id_hazops.'" class="btn btn-xs btn-primary">Edit</a>';
            })
            ->make(true);
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
            'node' => 'required',
            'deviation' => 'required',
            'cause' => 'required',
            'consequence' => 'required',
            'safeguards' => 'required',
            'actions' => 'required',
        ]);

        // Convert the array of selected components to a string
        // $keteranganBarang = implode(', ', $validatedData['komponen']);

        // Create a new User instance
        $HSE_Hazops = HSE_Hazops::create([
            'node' => $validatedData['node'],
            'deviation' => $validatedData['deviation'],
            'cause' => $validatedData['cause'],
            'consequence' => $validatedData['consequence'],
            'safeguards' => $validatedData['safeguards'],
            'actions' => $validatedData['actions']
        ]);
        
        $HSE_Hazops->save();

        return redirect('/HSE_Hazops')->with('success', 'Form submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(HSE_Hazops $hSE_Hazops)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HSE_Hazops $hSE_Hazops)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HSE_Hazops $hSE_Hazops)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HSE_Hazops $hSE_Hazops)
    {
        //
    }
}
