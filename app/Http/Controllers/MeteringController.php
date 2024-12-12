<?php

namespace App\Http\Controllers;

use App\Models\Metering_Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MeteringController extends Controller
{
    // List all metering
    public function index(Request $request)
    {
        // Retrieve the 'date' parameter from the query string
        $date = $request->input('date');

        if ($date) {
            // Filter data by the exact date
            $data = Metering_Data::whereDate('created_at', $date)->get();
        } else {
            // If no date is provided, return all data (optional)
            $data = Metering_Data::all();
        }

        return response()->json($data);

        // return response()->json(Metering::all(), 200);
    }

    // Store a new metering
    // public function store(Request $request)
    // {
    //     $metering = Metering::create($request->all());
    //     return response()->json($metering, 201);
    // }

    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'F' => 'required',
        //     'U1' => 'required',
        //     'U2' => 'required',
        //     'U3' => 'required',
        //     'Uavg' => 'required',
        //     'U12' => 'required',
        //     'U23' => 'required',
        //     'U31' => 'required',
        //     'Ulavg' => 'required',
        //     'IL1' => 'required',
        //     'IL2' => 'required',
        //     'IL3' => 'required',
        //     'Iavg' => 'required',
        //     'In' => 'required',
        //     'Pa' => 'required',
        //     'Pb' => 'required',
        //     'Pc' => 'required',
        //     'Psum' => 'required',
        //     'Qa' => 'required',
        //     'Qb' => 'required',
        //     'Qc' => 'required',
        //     'Qsum' => 'required',
        //     'Sa' => 'required',
        //     'Sb' => 'required',
        //     'Sc' => 'required',
        //     'Ssum' => 'required',
        //     'PFa' => 'required',
        //     'PFb' => 'required',
        //     'PFc' => 'required',
        //     'PFsum' => 'required',
        //     'U_unbl' => 'required',
        //     'I_unbl' => 'required',
        //     'LCR' => 'required',
        //     'P_Dmd' => 'required',
        //     'Q_Dmd' => 'required',
        //     'S_Dmd' => 'required',
        //     'I1_Dmd' => 'required',
        //     'I2_Dmd' => 'required',
        //     'I3_Dmd' => 'required',
        //     'Ep_Imp' => 'required',
        //     'Ep_Exp' => 'required',
        //     'Eq_Imp' => 'required',
        //     'Eq_Exp' => 'required',
        //     'Ep_sum' => 'required',
        //     'Ep_net' => 'required',
        //     'Eq_sum' => 'required',
        //     'Eq_net' => 'required',
        //     'Es' => 'required',
        //     'Epa_Imp' => 'required',
        //     'Epa_Exp' => 'required',
        //     'Epb_Imp' => 'required',
        //     'Epb_Exp' => 'required',
        //     'Epc_Imp' => 'required',
        //     'Epc_Exp' => 'required',
        //     'Eqa_Imp' => 'required',
        //     'Eqa_Exp' => 'required',
        //     'Eqb_Imp' => 'required',
        //     'Eqb_Exp' => 'required',
        //     'Eqc_Imp' => 'required',
        //     'Eqc_Exp' => 'required',
        //     'Esa' => 'required',
        //     'Esb' => 'required',
        //     'Esc' => 'required',
        //     'PhsAngV2toV1' => 'required',
        //     'PhsAngV3toV1' => 'required',
        //     'PhsAngI1toV1' => 'required',
        //     'PhsAngI2toV1' => 'required',
        //     'PhsAngI3toV1' => 'required',
        // ]);

        // $data = $request->json()->all();
        // $timestamp = $data['timestamp'][0];
        // $gateway = $data['gateway'];
        // $device = $data['device'];
        // foreach ($device['readings'] as $reading) {
        //     $validatedData[$reading['param']] = $reading['value'][0];
        // }
        // $validatedData = [
        //     'device_model' => $device['model'],
        //     'device_name' => $device['serial'],
        //     'timestamp' => $timestamp,
        //     'online' => $device['online'],
        //     'F' => $validatedData['Freq_Hz'],
        //     'U1' => $validatedData['V1'],
        //     'U2' => $validatedData['V2'],
        //     'U3' => $validatedData['V3'],
        //     'Uavg' => $validatedData['Vnavg_V'],
        //     'U12' => $validatedData['V12'],
        //     'U23' => $validatedData['V23'],
        //     'U31' => $validatedData['V31'],
        //     'Ulavg' => $validatedData['VIavg_V'],
        //     'IL1' => $validatedData['I1'],
        //     'IL2' => $validatedData['I2'],
        //     'IL3' => $validatedData['I3'],
        //     'Iavg' => $validatedData['Iavg_A'],
        //     'In' => $validatedData['In'],
        //     'Pa' => $validatedData['P1'],
        //     'Pb' => $validatedData['P2'],
        //     'Pc' => $validatedData['P3'],
        //     'Psum' => $validatedData['Psum_kW'],
        //     'Qa' => $validatedData['Q1'],
        //     'Qb' => $validatedData['Q2'],
        //     'Qc' => $validatedData['Q3'],
        //     'Qsum' => $validatedData['Qsum_kvar'],
        //     'Sa' => $validatedData['S1'],
        //     'Sb' => $validatedData['S2'],
        //     'Sc' => $validatedData['S3'],
        //     'Ssum' => $validatedData['Ssum_kVA'],
        //     'PFa' => $validatedData['PF1'],
        //     'PFb' => $validatedData['PF2'],
        //     'PFc' => $validatedData['PF3'],
        //     'PFsum' => $validatedData['PF'],
        //     'LCR' => $validatedData['LoadType'],
        // ];

        $validatedData = $request->all();
        $validatedData['device_model'] = $request->input('is_active', 'Acuvim II');
        $validatedData['device_name'] = $request->input('is_active', 'AMxxxxxxxx');
        $validatedData['online'] = $request->input('is_active', 1);

        try {
            // Create a new Metering instance and save it
            Metering_Data::create($validatedData);

            return response()->json(['message' => 'Data inserted successfully'], 201);
        } catch (\Exception $e) {
            // Log and return error if insertion fails
            Log::error('Error inserting data: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while inserting data.'], 500);
        }
    }

    // Show a specific metering
    public function show($id)
    {
        $metering = Metering_Data::find($id);
        if (!$metering) {
            return response()->json(['error' => 'metering not found'], 404);
        }
        return response()->json($metering, 200);
    }

    // Update an metering
    public function update(Request $request, $id)
    {
        $metering = Metering_Data::find($id);
        if (!$metering) {
            return response()->json(['error' => 'metering not found'], 404);
        }
        $metering->update($request->all());
        return response()->json($metering, 200);
    }

    // Delete an metering
    public function destroy($id)
    {
        $metering = Metering_Data::find($id);
        if (!$metering) {
            return response()->json(['error' => 'metering not found'], 404);
        }
        $metering->delete();
        return response()->json(['message' => 'metering deleted'], 200);
    }

    public function getData()
    {
        // Fetch all relevant data from the database
        $data = Metering_Data::select([
            'project', 'section', 'device', 'sn', 'status',
            'F', 'U1', 'U2', 'U3', 'Uavg', 'U12', 'U23', 'U31', 'Ulavg',
            'IL1', 'IL2', 'IL3', 'Iavg', 'In', 'Pa', 'Pb', 'Pc', 'Psum',
            'Qa', 'Qb', 'Qc', 'Qsum', 'Sa', 'Sb', 'Sc', 'Ssum',
            'PFa', 'PFb', 'PFc', 'PFsum', 'U_unbl', 'I_unbl', 'LCR',
            'P_Dmd', 'Q_Dmd', 'S_Dmd', 'I1_Dmd', 'I2_Dmd', 'I3_Dmd',
            'Ep_Imp', 'Ep_Exp', 'Eq_Imp', 'Eq_Exp', 'Ep_sum', 'Ep_net',
            'Eq_sum', 'Eq_net', 'Es', 'Epa_Imp', 'Epa_Exp', 'Epb_Imp',
            'Epb_Exp', 'Epc_Imp', 'Epc_Exp', 'Eqa_Imp', 'Eqa_Exp',
            'Eqb_Imp', 'Eqb_Exp', 'Eqc_Imp', 'Eqc_Exp', 'Esa', 'Esb',
            'Esc', 'PhsAngV2toV1', 'PhsAngV3toV1', 'PhsAngI1toV1',
            'PhsAngI2toV1', 'PhsAngI3toV1', 'updated_at'
        ])->get();

        return response()->json($data);
    }
}
