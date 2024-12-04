<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use App\Models\Requirement;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Haal beperkingen van form
        $names = $request->input('keuze',[]);  // Een array van opties


        // naar nieuwe pagina met resultaten
        return redirect()->route('vacatures',['names' => $names]);
    }
    public
    function showFilteredJobs(Request $request)
    {
        // Get the selected disabilities from query parameters
        $names = $request->query('names', []);

        // Query the jobs with requirements matching the selected disabilities
        if (!empty($names)) {
            $joblistings = JobListing::whereHas('requirements', function ($query) use ($names) {
                $query->whereIn('name', $names);
            })->get();

        } else {
            $joblistings = JobListing::all(); // Show all jobs if no filters are selected
        }


        // return gefilterde vacatures in view
        return view('job_listing.show', compact('joblistings'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
