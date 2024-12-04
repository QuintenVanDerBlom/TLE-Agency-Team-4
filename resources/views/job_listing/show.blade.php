

<div class="vacancies">
    @forelse($jobListings as $job)
        <div class="vacancy-details">
            <h1>{{ $job->name }}</h1>
            <p><strong>Bedrijf:</strong> {{ $job->company->name }}</p>
            <p><strong>Loon:</strong> €{{ number_format($job->salary, 2) }}</p>
            <p><strong>Uren:</strong> {{ $job->hours }}</p>
            <p><strong>Locatie:</strong> {{ $job->company->location }}</p>
            <p><strong>Beschrijving:</strong> {{ $job->description ?? 'Geen beschrijving beschikbaar.' }}</p>
        </div>
    @empty
        <p>Geen vacatures gevonden.</p>
    @endforelse
</div>


