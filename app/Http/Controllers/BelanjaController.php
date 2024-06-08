<?php

namespace App\Http\Controllers;

use App\Models\Belanja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DataTables;

class BelanjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $totalBelanja = Belanja::sum('totalBelanja');

        // dd($request->all());

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

    public function getData()
    {
        // $users = Belanja::select(['id_product', 'jenisBelanja', 'keteranganBarang', 'totalBelanja', 'created_at']);

        // $belanja = Belanja::whereMonth('created_at', Carbon::now()->month)->get();
        $belanja = Belanja::all();

        // dd($belanja);

        return DataTables::of($belanja)
            ->editColumn('created_at', function ($belanja) {
                return $belanja->created_at->format('Y-m-d H:i');
            })
            ->addColumn('action', function($belanja) {
                $showUrl = route('Belanja.show', $belanja->id_product); 
                // $editUrl = route('Belanja.edit', $belanja->id_product); 
                // <a href="'.$editUrl.'" class="btn btn-xs btn-primary">Edit</a>
                $deleteUrl = route('Belanja.destroy', $belanja->id_product); 
                return '
                    <a href="'.$showUrl.'" class="btn btn-xs btn-primary">View</a>
                    <form action="'.$deleteUrl.'" method="POST" style="display: inline-block;">
                        '.csrf_field().'
                        '.method_field('DELETE').'
                        <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                    </form>
                ';
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
            'jenisBelanja' => 'required',
            'komponen' => 'required',
            'totalBelanja' => 'required',
        ]);

        // Convert the array of selected components to a string
        // $keteranganBarang = implode(', ', $validatedData['komponen']);

        // Create a new User instance
        $belanja = Belanja::create([
            'jenisBelanja' => $validatedData['jenisBelanja'],
            'keteranganBarang' => $validatedData['komponen'],
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
    public function destroy($id_product)
    {
        $id = Belanja::find($id_product);

        if ($id) {
            $id->delete();
            return redirect()->back()->with('success', 'User deleted successfully.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }
}
