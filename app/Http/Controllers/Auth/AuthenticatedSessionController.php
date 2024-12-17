<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Haal de huidige gebruiker op
        $user = Auth::user();

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Je moet ingelogd zijn om je in te schrijven.');
        }

//        // Haal de huidige gebruiker op
//        $user = Auth::user();

        $id = $request->input('job_id');
        // Controleer of de gebruiker al is ingeschreven voor de vacature
        if ($user->jobListings()->where('vacature_id', $id)->exists()) {
            // Als de gebruiker al is ingeschreven, stuur een foutmelding
            return redirect()->route('jobapplication.index')->with('success', 'Je bent al ingeschreven voor de vacature!');
        }

        // Voeg de joblisting toe aan de user via de pivot tabel
        $user->jobListings()->attach($id);

        // Na inloggen, redirect terug naar de pagina die de gebruiker oorspronkelijk wilde bezoeken
        return redirect()->intended(route('jobapplication.store', ['job_id' => $request->input('job_id')]))
            ->with('success', 'Je bent succesvol ingelogd!');

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
