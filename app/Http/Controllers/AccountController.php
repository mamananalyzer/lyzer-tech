<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DataTables;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $totalBelanja = Account::sum('totalAccount');

        // dd($request->all());

        // Get the current month and last month
        // $currentMonth = Carbon::now()->format('Y-m');
        // $lastMonth = Carbon::now()->subMonth()->format('Y-m');

        // Query to get the totalAccount for this month
        // $totalThisMonth = Account::where(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"), $currentMonth)
        //     ->sum('totalAccount');

        // Query to get the totalAccount for last month
        // $totalLastMonth = Account::where(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"), $lastMonth)
        //     ->sum('totalAccount');
        // $session = $totalThisMonth/$totalLastMonth*100;

        return view('base.account'
            // , compact('totalAccount', 'session')
        );
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //
    }
}
