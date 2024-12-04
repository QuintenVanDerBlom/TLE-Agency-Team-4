<x-layout>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Job Listings</title>
        <style>
            .vacancies {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
                justify-content: center;
                margin-top: 20px;
            }

            .vacancy-card {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                border: 1px solid #dcdcdc;
                border-radius: 10px;
                padding: 15px;
                background-color: #fafafa;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                width: 300px; /* Zorg dat alle categorieën dezelfde breedte hebben */
            }

            .vacancy-card-content {
                display: flex;
                align-items: center;
                gap: 15px;
            }

            .vacancy-card img {
                width: 60px;
                height: 60px;
                border-radius: 50%;
                object-fit: cover;
            }

            .vacancy-card-link {
                flex: 1;
                text-decoration: none; /* Verwijder onderstreping van links */
                color: inherit; /* Zorg dat de tekstkleur hetzelfde blijft */
            }

            .vacancy-card h2 {
                margin: 0;
                font-size: 18px;
                font-weight: bold;
                color: #333;
            }

            .vacancy-card p {
                margin: 5px 0;
                font-size: 14px;
                color: #555;
            }

            .apply-btn-link {
                margin-top: 15px;
                display: flex;
                justify-content: flex-end;
            }

            .apply-btn {
                padding: 10px 20px;
                background-color: #313D29;
                color: #fff;
                border: none;
                border-radius: 5px;
                font-size: 14px;
                cursor: pointer;
                transition: background-color 0.3s ease;
                width: 100%; /* Maak de knop volledige breedte */
                text-align: center;
            }

            .apply-btn:hover {
                background-color: #2a3423;
            }
        </style>
    </head>
    <body>
    <h1>[ROL] Vacatures</h1>

    <div class="vacancies">
        @forelse($jobListings as $job)
            <div class="vacancy-card">
                <!-- Vacature inhoud (afbeelding + tekst) -->
                <div class="vacancy-card-content">
                    <img src="{{ asset('/images/bedrijf/bedrijf.png') }}" alt="Vacature afbeelding">
                    <a href="{{ route('joblistings.show', ['id' => $job->id]) }}" class="vacancy-card-link">
                        <h2>{{ $job->name }}</h2>
                        <p><strong>Bedrijf:</strong> {{ $job->company->name }}</p>
                        <p><strong>Loon:</strong> €{{ number_format($job->salary, 2) }}</p>
                        <p><strong>Uren:</strong> {{ $job->hours }}</p>
                        <p><strong>Locatie:</strong> {{ $job->company->location }}</p>
                    </a>
                </div>

                <!-- Knop sectie -->
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
    </body>
    </html>
</x-layout>
