<?php

namespace App\Http\Controllers;

use App\Models\Labs_Label;
use Illuminate\Http\Request;
use DataTables;

class Labs_LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getData()
    {
        // $users = Belanja::select(['id_product', 'jenisBelanja', 'keteranganBarang', 'totalBelanja', 'created_at']);

        // $labs_label = Belanja::whereMonth('created_at', Carbon::now()->month)->get();
        $labs_label = Labs_Label::all();

        // dd($labs_label);

        return DataTables::of($labs_label)
            ->editColumn('id_label', function ($labs_label) {
                $yearSuffix = $labs_label->created_at->format('y'); // Get the last two digits of the year
                $id_label_padded = str_pad($labs_label->id_label, 3, '0', STR_PAD_LEFT); // Pad the id_label with zeros to be 3 digits long
                return $yearSuffix . $id_label_padded; // Combine the year suffix and the padded id_label
            })
            ->editColumn('created_at', function ($labs_label) {
                return $labs_label->created_at->format('Y-m-d H:i');
            })
            ->addColumn('action', function($labs_label) {
                $showUrl = route('Labs_Label.show', $labs_label->created_at); 
                // $editUrl = route('Labs_Label.edit', $labs_label->id_label); 
                // <a href="'.$editUrl.'" class="btn btn-xs btn-primary">Edit</a>
                $deleteUrl = route('Labs_Label.destroy', $labs_label->id_label); 
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
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'brand' => 'required',
    //         'customer' => 'required',
    //         'PO' => 'required',
    //         'type' => 'required',
    //         'qty' => 'required|integer|min:1',
    //         'scale' => 'required',
    //         'input' => 'required',
    //     ]);

    //     $quantity = $validatedData['qty'];

    //     for ($i = 0; $i < $quantity; $i++) {
    //         Labs_Label::create([
    //             'brand' => $validatedData['brand'],
    //             'customer' => $validatedData['customer'],
    //             'PO' => $validatedData['PO'],
    //             'type' => $validatedData['type'],
    //             'qty' => 1,
    //             'scale' => $validatedData['scale'],
    //             'input' => $validatedData['input'],
    //         ]);
    //     }

    //     return redirect('/Labs')->with('success', 'Form submitted successfully!');
    // }

    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'brand' => 'required',
            'customer' => 'required',
            'PO' => 'required',
            'type.*' => 'required',  // Using the * syntax to validate each array entry
            'scale.*' => 'required',
            'input.*' => 'required',
            'qty.*' => 'required',
        ]);

        // Loop through each set of inputs
        foreach ($request['type'] as $index => $type) {
            // Get the quantity for the current index
            $quantity = $request['qty'][$index];

            // Create multiple entries based on the quantity
            for ($i = 0; $i < $quantity; $i++) {
                Labs_Label::create([
                    'brand' => $request['brand'],
                    'customer' => $request['customer'],
                    'PO' => $request['PO'],
                    'type' => $type,
                    'scale' => $request['scale'][$index],
                    'input' => $request['input'][$index],
                    'qty' => 1, // Set qty to 1 for each individual entry
                ]);
            }
        }

        return redirect('/Labs')->with('success', 'Form submitted successfully!');
}



    /**
     * Display the specified resource.
     */
    public function show($created_at)
    {
        // Fetch all records with the given PO
        $Labs_Label = Labs_Label::where('created_at', $created_at)->get();

        // dd($Labs_Label);

        // Pass the records to the view
        return view('base.Labs_LabelShow', compact('Labs_Label'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Labs_Label $labs_Label)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Labs_Label $labs_Label)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Labs_Label $labs_Label)
    {
        //
    }
}
