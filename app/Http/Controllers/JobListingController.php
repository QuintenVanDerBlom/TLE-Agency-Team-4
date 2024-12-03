<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use App\Models\JobListingsCategory;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(JobListingsCategory $jobListingsCategory)
    {
        // Haal alle JobListings op die aan deze JobListingsCategory gekoppeld zijn
        $jobListings = $jobListingsCategory->jobListings;

        // Geef de resultaten door aan de view
        return view('job_listing.index', compact('jobListings', 'jobListingsCategory'));
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
    public function show($id)
    {
        // Zoek de JobListing op basis van de id, of geef een 404-fout als deze niet bestaat
        $jobListing = JobListing::findOrFail($id);

        // Geef de specifieke job listing door aan de view
        return view('job_listing.show', compact('jobListing'));
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
