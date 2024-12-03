<x-layout>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Job Listings</title>
        <style>
            .categories {
                display: flex;
                flex-wrap: wrap;
                gap: 15px;
                justify-content: center;
            }
            .category-card {
                background-color: #fff;
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 15px;
                width: 250px;
                text-align: center;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }
            .category-card h2 {
                font-size: 18px;
                margin-bottom: 10px;
                color: #555;
            }
            .category-card p {
                margin: 5px 0;
                font-size: 14px;
                color: #777;
            }
        </style>
    </head>
    <body>
    <h1>[ROL] Vacatures</h1>
    <div class="categories">
        @forelse($jobListings as $job)
            <div class="category-card">
                <h2>{{ $job->name }}</h2>
                <p><strong>Bedrijf:</strong> {{ $job->company->name }}</p>
                <p><strong>Loon:</strong> €{{ number_format($job->salary, 2) }}</p>
                <p><strong>Uren:</strong> {{ $job->hours }}</p>
                <p><strong>Locatie:</strong> {{ $job->company->location }}</p>
            </div>
        @empty
            <p>Geen vacatures gevonden.</p>
        @endforelse
    </div>

    </body>
    </html>
</x-layout>
