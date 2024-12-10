<x-layout>

    <h3 class="title">Gefilterde Vacatures</h3>

    @forelse($jobListings as $job)
        <div class="cat-container">
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
        </div>
    @empty
        <p>Geen vacatures gevonden die voldoen aan de geselecteerde criteria.</p>
    @endforelse

</x-layout>
