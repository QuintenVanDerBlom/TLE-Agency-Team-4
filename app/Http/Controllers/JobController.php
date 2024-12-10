<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JobListing;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function filter(Request $request)
    {
//        dd($request->input('keuze'));
        // Verkrijg de geselecteerde beperkingen uit het formulier
        $selectedRequirements = $request->input('keuze', []);


        // Verkrijg de id uit de querystring (bijvoorbeeld: ?id=1)
        $categoryId = $request->query('id');

        // Filter de vacatures op basis van de geselecteerde beperkingen en de categorie ID
        $jobListings = JobListing::where('job_listing_category_id', $categoryId)
            ->whereHas('requirements', function ($query) use ($selectedRequirements) {
                $query->whereIn('name', $selectedRequirements);
            })
            ->get();

        // Geef de gefilterde vacatures door aan de view
        return view('filter-vacatures', compact('jobListings'));
    }


}

