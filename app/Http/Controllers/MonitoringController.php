<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use App\Models\Metering_Facility;
use App\Models\Metering_Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function realtime()
    {
        $projects = DB::table('metering_facility')->distinct()->pluck('project');
        $tree = [];

        // Loop through each project and build the tree
        foreach ($projects as $project) {
            $projectNode = [
                'id' => 'project_' . $project,
                'text' => $project,
                'icon' => 'fas fa-folder', // Add icon for parent (project)
                'state' => ['opened' => true],
                'children' => [],
            ];

            // Find sections for each project
            $sections = DB::table('metering_facility')->where('project', $project)->distinct()->pluck('section');

            foreach ($sections as $section) {
                $sectionNode = [
                    'id' => 'section_' . $section,
                    'text' => $section,
                    'icon' => 'fas fa-folder', // Add icon for parent (project)
                    'state' => ['opened' => true],
                    'children' => [],
                ];

                // Find sn (serial numbers) for each section
                $devices = DB::table('metering_facility')->where('section', $section)->distinct()->pluck('device');

                foreach ($devices as $device) {
                    $deviceNode = [
                        'id' => 'device_' . $device,
                        'text' => $device,
                        'icon' => 'fas fa-image text-success', // Add icon for sn (child) with color
                        'state' => ['opened' => true],
                        'children' => [], // Ensure this is an empty array
                    ];

                    // Add sn node to section node
                    $sectionNode['children'][] = $deviceNode;
                }

                // Add section node to project node
                $projectNode['children'][] = $sectionNode;
            }

            // Add project node to tree
            $tree[] = $projectNode;
        }

        // Debug: Check the structure of the tree before passing it to the view
        // dd($tree);

        // Convert tree to JSON to pass to the view
        $treeData = json_encode($tree, JSON_UNESCAPED_UNICODE);

        // Pass to the view
        return view('base.monitoring-realtime', ['treeData' => $treeData]);

        // return view('base.monitoring-realtime', ['treeData' => json_encode($tree)]);
    }

    public function selectedDevice(Request $request)
    {
        // Decode the selected devices JSON from the hidden input

        $selectedDevices = $request->input('selectedDevices', '[]');
        // dd($selectedDevices);

        // Decode JSON into PHP array
        $devices = json_decode($selectedDevices, true);

        // return response()->json([
        //     'message' => 'Devices received successfully',
        //     'devices' => $devices,
        // ]);
        return redirect()->route('monitoring-comparison')->with('devices', $devices);
    }

    public function comparison()
    {
        $devices = session('devices', []); // Default to an empty array if not present
        $nameDevices = $devices;

        // Query the database to get the device_name for the provided devices
        $deviceNames = DB::table('metering_facility')
        ->whereIn('device', $devices) // Filter by device column
        ->pluck('device_name') // Get device_name column
        ->toArray(); // Convert to array

        $projects = DB::table('metering_facility')->distinct()->pluck('project');
        $deviceNames = $deviceNames; // Replace with your device names

        $tree = [];

        // Loop through each project and build the tree
        foreach ($projects as $project) {
            $projectNode = [
                'id' => 'project_' . $project,
                'text' => $project,
                'icon' => 'fas fa-folder', // Add icon for parent (project)
                'state' => ['opened' => true],
                'children' => [],
            ];

            // Find sections for each project
            $sections = DB::table('metering_facility')->where('project', $project)->distinct()->pluck('section');

            foreach ($sections as $section) {
                $sectionNode = [
                    'id' => 'section_' . $section,
                    'text' => $section,
                    'icon' => 'fas fa-folder', // Add icon for parent (project)
                    'state' => ['opened' => true],
                    'children' => [],
                ];

                // Find sn (serial numbers) for each section
                $devices = DB::table('metering_facility')->where('section', $section)->distinct()->pluck('device');

                foreach ($devices as $device) {
                    $deviceNode = [
                        'id' => 'device_' . $device,
                        'text' => $device,
                        'icon' => 'fas fa-image text-success', // Add icon for sn (child) with color
                        'state' => ['opened' => true],
                        'children' => [], // Ensure this is an empty array
                    ];

                    // Add sn node to section node
                    $sectionNode['children'][] = $deviceNode;
                }

                // Add section node to project node
                $projectNode['children'][] = $sectionNode;
            }

            // Add project node to tree
            $tree[] = $projectNode;
        }
        // Convert tree to JSON to pass to the view
        $treeData = json_encode($tree, JSON_UNESCAPED_UNICODE);

        // $Metering_Data = Metering_Data::all();

        // $deviceNames = ['AMxxxxxxxx', 'AMxxxxxxxy', 'AMxxxxxxxz']; // Replace with your device names
        $Metering_Data = Metering_Data::whereIn('device_name', $deviceNames)
            ->orderBy('device_name') // Grouping by device_name
            ->orderBy('timestamp', 'desc') // Ensure latest data comes first
            ->get()
            ->unique('device_name'); // Keep only the latest record for each device_name

        // dd($nameDevices);

        // Pass to the view
        return view('base.monitoring-comparison', [
            'treeData' => $treeData,
            'Metering_Data' => $Metering_Data,
            'nameDevices' => $nameDevices
        ]);
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
    public function show(Monitoring $monitoring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Monitoring $monitoring)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Monitoring $monitoring)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Monitoring $monitoring)
    {
        //
    }
}
