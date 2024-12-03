<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
        public
        function filter(Request $request)
        {
            // Haal beperkingen van form
            $disabilities = $request->input('keuze');  // This is an array of selected options

            // in session bewaren
            session(['disabilities' => $disabilities]);

            // naar nieuwe pagina met resultaten
            return redirect()->route('disabilities');
        }

        public
        function showFilteredJobs()
        {
            // beperkingen halen bij session
            $disabilities = session('disabilities', []);

            // Query the job listing met beperkingen
            $jobs = Job::where(function ($query) use ($disabilities) {
                foreach ($disabilities as $disability) {
                    $query->orWhere('disability', $disability);
                }
            })->get();

            // return gefilterde vacatures in view
            return view('filter-vacatures', compact('jobs'));
        }
    }

