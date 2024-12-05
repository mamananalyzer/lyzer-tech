<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use App\Models\Metering;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = DB::table('metering')->distinct()->pluck('project');
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
            $sections = DB::table('metering')->where('project', $project)->distinct()->pluck('section');

            foreach ($sections as $section) {
                $sectionNode = [
                    'id' => 'section_' . $section,
                    'text' => $section,
                    'icon' => 'fas fa-folder', // Add icon for parent (project)
                    'state' => ['opened' => true],
                    'children' => [],
                ];

                // Find sn (serial numbers) for each section
                $sns = DB::table('metering')->where('section', $section)->distinct()->pluck('sn');

                foreach ($sns as $sn) {
                    $snNode = [
                        'id' => 'sn_' . $sn,
                        'text' => $sn,
                        'icon' => 'fas fa-image text-success', // Add icon for sn (child) with color
                        'state' => ['opened' => true],
                        'children' => [], // Ensure this is an empty array
                    ];

                    // Add sn node to section node
                    $sectionNode['children'][] = $snNode;
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
