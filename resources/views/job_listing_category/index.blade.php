<x-layout>
    <main class="flex-content">
        <div id="stap2">
            <a href="javascript:history.back()">
                <img class="back-button" src="{{ asset('/images/backarrow.png') }}" alt="back-button">
            </a>
            <h1>Stap 2: Kies je baan categorie</h1>
        </div>

        <section>
            <div class="category-blocks">
                @forelse($jobListingsCategories as $jobListingCategory)
                    <a href="{{ route('joblistings.show', $jobListingCategory->id) }}" class="job-block">
                        <div class="job-image">
                            <img src="{{ asset('/images/happybusiness.jpg') }}" alt="job image">
                        </div>
                        <div class="job-content">
                            <h3>{{ $jobListingCategory->name }}</h3>
                            <p>{{ $jobListingCategory->information }}</p>
                        </div>
                        <div class="job-action">
                            <button>Aanmelden</button>
                        </div>
                    </a>
                @empty
                    <p>Geen vacatures voor deze categorie.</p>
                @endforelse
            </div>
        </section>
    </main>
</x-layout>
