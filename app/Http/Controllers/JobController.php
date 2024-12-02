<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
        public
        function filter(Request $request)
        {
            // Haal beperkingen van form
            $beperkingen = $request->input('keuze');  // This is an array of selected options

            // in session bewaren
            session(['beperkingen' => $beperkingen]);

            // naar nieuwe pagina met resultaten
            return redirect()->route('filter.vacatures');
        }

        public
        function showFilteredJobs()
        {
            // Retrieve the disabilities from the session
            $beperkingen = session('beperkingen', []);

            // Query the job postings based on the selected disabilities (if any)
            $jobs = Job::where(function ($query) use ($beperkingen) {
                foreach ($beperkingen as $beperking) {
                    $query->orWhere('disability', $beperking);
                }
            })->get();

            // Return the filtered jobs to a different view
            return view('filter-vacatures', compact('jobs'));
        }
    }

