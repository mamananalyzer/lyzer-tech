<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

    public function getData()
    {
        // $users = Belanja::select(['id_product', 'jenisBelanja', 'keteranganBarang', 'totalBelanja', 'created_at']);

        // $belanja = Belanja::whereMonth('created_at', Carbon::now()->month)->get();
        $motor = Motor::all();

        return DataTables::of($motor)
            ->editColumn('created_at', function ($motor) {
                return $motor->created_at->format('Y-m-d H:i');
            })
            ->addColumn('action', function($motor) {
                $showUrl = route('Motor.show', $motor->id_motor); 
                // $editUrl = route('Motor.edit', $motor->id_motor); 
                // <a href="'.$editUrl.'" class="btn btn-xs btn-primary">Edit</a>
                $deleteUrl = route('Motor.destroy', $motor->id_motor); 
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

        // Validate the request to ensure 'services' array is submitted
        $validatedData = $request->validate([
            'services' => 'required|array',
            'services.*' => 'string',
            'komponenBeli' => 'required',
            'komponenBeli.*' => 'string',
            'totalBelanja' => 'required',
            'totalBelanja.*' => 'numeric',
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'serviceDate' => 'required|date',
        ]);        

        // Format serviceDate to store only the date part (YYYY-MM-DD)
        $formattedServiceDate = date('Y-m-d', strtotime($validatedData['serviceDate']));

        $userName = Auth::user()->name; // Get the authenticated user's name
        // Set namaMotor based on the user's name
        $namaMotor = $userName === 'Zakiyah Ais Syafira' ? 'All New Vario 150' : 
                    ($userName === 'Ade Maman Suherman' ? 'ADV 160' : 'User Not Listed');

        // Create a new User instance
        $motor = Motor::create([
            'namaMotor' => $namaMotor,
            'id_user' => $userName,
            'typeService' => implode(', ', $validatedData['services']), // Encode array to store in DB
            'komponenBeli' => $validatedData['komponenBeli'],
            'totalBelanja' => $validatedData['totalBelanja'],
            'image' => $validatedData['image'],
            'serviceDate' => $formattedServiceDate,
        ]);

        // dd($motor);


        $motor->save();

        return redirect('/motor')->with('success', 'Form submitted successfully!');
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
    public function destroy($id_motor)
    {
        $id = Motor::find($id_motor);

        if ($id) {
            $id->delete();
            return redirect()->back()->with('success', 'User deleted successfully.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }
}
