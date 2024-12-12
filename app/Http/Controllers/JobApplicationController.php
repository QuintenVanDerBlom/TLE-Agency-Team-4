<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // Haal alle joblistings op waarvoor de gebruiker is ingeschreven
        $jobListings = $user->jobListings; // Dit maakt gebruik van de BelongsToMany relatie

        // Retourneer de joblistings naar de view
        return view('job_application.index', compact('jobListings'));
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
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Je moet ingelogd zijn om je in te schrijven.');
        }

        // Haal de huidige gebruiker op
        $user = Auth::user();

        $id = $request->input('job_id');
        // Controleer of de gebruiker al is ingeschreven voor de vacature
        if ($user->jobListings()->where('vacature_id', $id)->exists()) {
            // Als de gebruiker al is ingeschreven, stuur een foutmelding
            return redirect()->route('jobapplication.index')->with('success', 'Je bent al ingeschreven voor de vacature!');
        }

        // Voeg de joblisting toe aan de user via de pivot tabel
//        $user->jobListings()->attach($id);

        // Redirect naar de gewenste pagina (bijv. overzicht van inschrijvingen)
        return redirect()->route('jobapplication.index')->with('success', 'Je bent succesvol ingeschreven voor de vacature!');
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
    public function destroy($id)
    {
        // Controleer of de gebruiker ingelogd is
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Je moet ingelogd zijn om je uit te schrijven.');
        }

        $user = Auth::user();

        // Controleer of de gebruiker is ingeschreven voor de opgegeven vacature
        $jobListing = $user->jobListings()->where('vacature_id', $id)->first();

        if (!$jobListing) {
            return redirect()->route('jobapplication.index')->withErrors('Je bent niet ingeschreven voor deze vacature.');
        }

        // Verwijder de koppeling tussen de gebruiker en de vacature
        $user->jobListings()->detach($id);

        return redirect()->route('jobapplication.index')->with('success', 'Je bent succesvol uitgeschreven voor de vacature.');
    }

}
