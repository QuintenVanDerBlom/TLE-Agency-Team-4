<x-layout>
    <div class="cat-container">
        <div id="stap2" class="header-container">
            <a href="javascript:history.back()" class="back-button">
                <img src="{{ asset('/images/backarrow.png') }}" alt="back-button">
            </a>
            <h1 class="centered-text">Categorie</h1>
        </div>

        <div class="category-blocks">
            @forelse($jobListingsCategories as $jobListingCategory)
                <a href="{{ route('aanvullende-informatie', 'id='.$jobListingCategory->id) }}" class="job-block">
                    <div class = "category-div">
                    <div class="job-image">
                        <img src="{{ asset('/images/happybusiness.jpg') }}" alt="job image">
                    </div>
                    <div class="job-content">
                        <h3>{{ $jobListingCategory->name }}</h3>
                        <p>{{ $jobListingCategory->information }}</p>
                    </div>
                    </div>
                    <div class="job-action">
                        <button>Bekijk vacatures</button>
                    </div>
                </a>
            @empty
                <p>Geen vacatures voor deze categorie.</p>
            @endforelse
        </div>
    </div>
</x-layout>
