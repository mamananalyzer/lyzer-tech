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

        // Decode JSON into PHP array
        $devices = json_decode($selectedDevices, true);

        return redirect()->route('monitoring-comparison')->with('devices', $devices);
    }

    public function comparison()
    {
        $devices = session('devices', []); // Default to an empty array if not present
        $nameDevices = $devices;
        $deviceReal = $devices;

        // Query the database to get the device_name for the provided devices
        $deviceNames = DB::table('metering_facility')
        ->whereIn('device', $devices) // Filter by device column
        ->pluck('device_name') // Get device_name column
        ->toArray(); // Convert to array

        // $facilitys = DB::table('metering_facility')->distinct()->pluck('facility');
        // $deviceNames = $deviceNames; // Replace with your device names
        // $tree = [];
        // // Loop through each project and build the tree
        // foreach ($facilitys as $facility) {
        //     $facilityNode = [
        //         'id' => 'facility_' . $facility,
        //         'text' => $facility,
        //         'icon' => 'fas fa-folder', // Add icon for parent (facility)
        //         'state' => ['opened' => true],
        //         'children' => [],
        //     ];

        //     $projects = DB::table('metering_facility')->where('facility', $facility)->distinct()->pluck('project');

        //     foreach ($projects as $project) {
        //         $projectNode = [
        //             'id' => 'project_' . $project,
        //             'text' => $project,
        //             'icon' => 'fas fa-folder', // Add icon for parent (project)
        //             'state' => ['opened' => true],
        //             'children' => [],
        //         ];

        //         // Find sections for each project
        //         $sections = DB::table('metering_facility')->where('project', $project)->distinct()->pluck('section');

        //         foreach ($sections as $section) {
        //             $sectionNode = [
        //                 'id' => 'section_' . $section,
        //                 'text' => $section,
        //                 'icon' => 'fas fa-folder', // Add icon for parent (project)
        //                 'state' => ['opened' => true],
        //                 'children' => [],
        //             ];

        //             // Find sn (serial numbers) for each section
        //             $devices = DB::table('metering_facility')->where('section', $section)->distinct()->pluck('device');

        //             foreach ($devices as $device) {
        //                 $deviceNode = [
        //                     'id' => 'device_' . $device,
        //                     'text' => $device,
        //                     'icon' => 'fas fa-image text-success', // Add icon for sn (child) with color
        //                     'state' => ['opened' => true],
        //                     'children' => [], // Ensure this is an empty array
        //                 ];

        //                 // Add sn node to section node
        //                 $sectionNode['children'][] = $deviceNode;
        //             }

        //             // Add section node to project node
        //             $projectNode['children'][] = $sectionNode;
        //         }

        //         // Add section node to project node
        //         $facilityNode['children'][] = $projectNode;
        //     }

        //     // Add project node to tree
        //     $tree[] = $projectNode;
        // }
        // // Convert tree to JSON to pass to the view
        // // Filter the tree data to remove the node with ID 0
        // $tree = collect($tree)->filter(function ($node) {
        //     return $node['id'] > 0; // Assuming 'id' is the key
        // })->values()->toArray(); // Reindex array
        // // Now, encode the filtered array to JSON
        // $treeData = json_encode($tree, JSON_UNESCAPED_UNICODE);

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
        // Convert tree to JSON to pass to the view
        $treeData = json_encode($tree, JSON_UNESCAPED_UNICODE);


        $Metering_Data = DB::table('metering_data')
            ->leftJoin('metering_facility', 'metering_data.device_name', '=', 'metering_facility.device_name')
            ->select('metering_data.*', 'metering_facility.device')
            ->whereIn('metering_data.device_name', $deviceNames) // Filter based on device names
            ->orderBy('metering_data.device_name') // Grouping by device_name
            ->orderBy('metering_data.timestamp', 'desc') // Ensure latest data comes first
            ->get()
            ->unique('device_name'); // Keep only the latest record for each device_name

        $Metering_Facility = DB::table('metering_facility')->get();

        // Remove duplicates based on 'facility'
        $Metering_Facility = $Metering_Facility->unique('facility');

        // dd($Metering_Facility);

        // Pass to the view
        return view('base.monitoring-comparison', [
            'treeData' => $treeData,
            'Metering_Data' => $Metering_Data,
            'Metering_Facility' => $Metering_Facility,
            'nameDevices' => $nameDevices,
            'deviceReal' => $deviceReal,
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
