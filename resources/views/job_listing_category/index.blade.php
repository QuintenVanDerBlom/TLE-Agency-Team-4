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
                <a href="{{ route('joblistings.index') }}"
                   class="job-block"
                   onclick="storeCategoryId(event, {{ $jobListingCategory->id }})"
                >
                    <div class="category-div">
                        <div class="job-image">
                            <img src="{{ asset('/images/happybusiness.jpg') }}" alt="job image">
                        </div>
                        <div class="job-content">
                            <h3>{{ $jobListingCategory->name }}</h3>
                            <p>{{ $jobListingCategory->information }}</p>
                        </div>
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

<script>
    // Functie om de geselecteerde categorie op te slaan in localStorage en ook in de URL door te geven
    function storeCategoryId(event, categoryId) {
        event.preventDefault(); // Voorkom dat de link direct navigeert

        // Verkrijg de opgeslagen geselecteerde categorieën uit localStorage (indien aanwezig)
        let selectedCategories = JSON.parse(localStorage.getItem('selectedCategoryIds')) || [];

        // Voeg de nieuwe geselecteerde categorie toe aan de array (indien nog niet aanwezig)
        if (!selectedCategories.includes(categoryId)) {
            selectedCategories.push(categoryId);
        }

        // Sla de bijgewerkte array van geselecteerde categorieën op in localStorage
        localStorage.setItem('selectedCategoryIds', JSON.stringify(selectedCategories));
        console.log(`Categorie IDs opgeslagen in localStorage: ${selectedCategories}`);

        // Navigeer daarna naar de joblistings pagina met de category_ids in de URL
        const link = event.currentTarget;
        const params = new URLSearchParams(window.location.search);
        selectedCategories.forEach(id => params.append('category_ids[]', id));  // Voeg elke categorie toe aan de URL

        window.location.href = link.href + '?' + params.toString();  // Voeg de querystring toe aan de URL
    }
</script>
