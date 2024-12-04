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

      $jobListings = JobListing::all();
       // $jobListings = JobListing::with('category')->get();
       // $categoryId = $jobListings->first()->job_listing_category_id; // Haal de category ID van de eerste vacature, of pas dit aan zoals nodig

        return view('job_listing.index', compact('jobListings'));
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
        // Haal de vacature op via het ID
        $jobListings = JobListing::with('company')->findOrFail($id);

        // Toon de view met de vacaturedetails
        return view('job_listing_category.index', compact('jobListings'));
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
