<x-layout>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Job Listings</title>
        <style>
        </style>
    </head>
    <div class="cat-container">
        <div id="stap2" class="header-container">
            <a href="javascript:history.back()" class="back-button">
                <img src="{{ asset('/images/backarrow.png') }}" alt="back-button">
            </a>
            <h1 class="centered-text">Vacatures</h1>
        </div>

        <div class="vacancies">

            @forelse($jobListings as $job)
                <div class="vacancy-card">
                    <div class="vacancy-card-content">
                        <img src="{{ asset('/images/bedrijf/bedrijf.png') }}" alt="Vacature afbeelding">
                        <a href="{{ route('joblistings.show', ['id' => $job->id]) }}" class="vacancy-card-link">
                            <h2>{{ $job->company->name }}</h2>
                            <p><strong>Loon:</strong> €{{ number_format($job->salary, 2) }},- p.m.</p>
                            <p><strong>Uren:</strong> {{ $job->hours }}</p>
                            <p><strong>Locatie:</strong> {{ $job->company->location }}</p>
                        </a>
                    </div>
                    <div class="apply-btn-link">
                        <a href="{{ route('joblistings.show', ['id' => $job->id]) }}">
                            <button class="apply-btn">Inschrijven</button>
                        </a>
                    </div>
                </div>

            @empty
                <p>Geen vacatures gevonden.</p>
            @endforelse

        </div>
    </div>
    </html>
</x-layout>
