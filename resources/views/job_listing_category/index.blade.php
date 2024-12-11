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
                <a href="{{ route('requirement.index') }}"
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
    function storeCategoryId(event, categoryId) {
        event.preventDefault(); // Voorkom directe navigatie

        // Haal geselecteerde categorieën uit localStorage
        let selectedCategories = JSON.parse(localStorage.getItem('selectedCategoryIds')) || [];

        // Voeg de nieuwe categorie toe, als deze nog niet bestaat
        if (!selectedCategories.includes(categoryId)) {
            selectedCategories.push(categoryId);
        }

        // Sla de bijgewerkte lijst op in localStorage
        localStorage.setItem('selectedCategoryIds', JSON.stringify(selectedCategories));

        // Verkrijg de huidige URL-parameters
        const link = event.currentTarget;
        const params = new URLSearchParams(window.location.search);

        // Voeg category_ids toe aan de URL
        selectedCategories.forEach(id => params.append('category_ids[]', id));

        // Haal ook de requirement_ids op uit localStorage en voeg ze toe aan de URL (indien aanwezig)
        let selectedRequirements = JSON.parse(localStorage.getItem('selectedRequirementIds')) || [];
        selectedRequirements.forEach(id => params.append('requirement_ids[]', id));

        // Navigeer naar de nieuwe URL
        window.location.href = link.href + '?' + params.toString();
    }
</script>
