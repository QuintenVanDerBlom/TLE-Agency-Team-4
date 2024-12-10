<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\JobListing;
use App\Models\JobListingCategory;
use App\Models\Requirement;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categoryIds = $request->input('category_ids', []);
        $requirementIds = $request->input('requirement_ids', []);

        $jobListings = JobListing::all();
        $jobListingCategories = JobListingCategory::all();
        $categories = Category::all();
        $requirements = Requirement::all();
        // Verkrijg de querystring waarde van 'id' (bijv. ?id=1)
        $categoryId = $request->query('id');

        return view('job_listing.index', compact('jobListings', 'categoryIds', 'categories', 'requirements', 'requirementIds'), compact('jobListingCategories'));
        // Als er een id is, filter dan de vacatures op basis van de job listing category ID
        if ($categoryId) {
            $jobListings = JobListing::where('job_listing_category_id', $categoryId)->get();
        } else {
            // Haal anders alle vacatures op
            $jobListings = JobListing::all();
        }

        // Geef de vacatures door aan de view
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

    // JobListingController.php
    public function filter(Request $request)
    {

        // Valideer de geselecteerde keuzes
        $validated = $request->validate([
            'keuze' => 'array|nullable',
            'keuze.*' => 'string|in:Visuele beperking,Auditieve beperking,Cognitieve beperking of Leerstoornis,Psychische beperking,Motorische beperking,Spraak of Communicatiestoornis,Verstandelijke beperking,Chronische Ziekte of Pijn,Neurologische Aandoeningen,Sensorische Stoornis,Amputaties of Ledemaatafwijking,Verborgen beperking'
        ]);

        // Verkrijg de geselecteerde beperkingen uit de request
        $selectedKeuzes = $validated['keuze'] ?? [];  // Als er geen keuzes zijn, dan wordt een lege array gebruikt.

        // Als er geen beperkingen zijn geselecteerd, haal dan alle vacatures op
        if (empty($selectedKeuzes)) {
            $jobListings = JobListing::all();  // Als geen beperking is gekozen, haal alle vacatures op
        } else {
            // Zoek vacatures die voldoen aan de geselecteerde beperkingen
            $jobListings = JobListing::whereHas('requirements', function ($query) use ($selectedKeuzes) {
                // Filter de vacatures die voldoen aan de gekozen beperkingen
                $query->whereIn('name', $selectedKeuzes);
            })->get();
        }

        // Als er geen vacatures zijn, redirect dan naar joblisting.index met een foutmelding
        if ($jobListings->isEmpty()) {
            return redirect()->route('joblistings.index')
                ->with('error', 'Geen vacatures gevonden die voldoen aan de geselecteerde criteria.');
        }

        // Geef de gefilterde vacatures door aan de Blade
        return view('filter-vacatures', compact('jobListings'));
    }


}
