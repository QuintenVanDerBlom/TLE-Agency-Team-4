<x-layout>
    <style>
        .back-button img{
            left: -3.8rem;
        }
    </style>
    <div class="cat-container">
        <div id="stap2" class="header-container">
            <a href="{{ route('categories.index') }}" class="back-button">
                <img src="{{ asset('/images/backarrow.png') }}" alt="back-button">
            </a>
            <h1 class="centered-text">Vacatures</h1>
        </div>
        <!-- Searchbar -->
        <form action="{{ route('joblistings.index') }}" method="GET" class="search-form">
            <label for="search" class="text-gray-800 font-semibold"></label>
            <div class="search-container">
                <input type="text" id="search" name="search" placeholder="Search">
                <button type="submit" class="search-submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
            </div>
        </form>
        <button class="open-modal-btn" id="openModalBtn">Filter</button>


        <!-- De Modal -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeModalBtn">&times;</span>
                <h2>Filters</h2>
                <form id="filter-form" method="GET" action="">
                    @forelse($categories as $category)
                        <!-- Hoofdcategorieën -->
                        <div class="category-item">
                            <div class="accordion" id="accordion-category-{{ $category->id }}">
                                <button class="accordion-button" type="button" onclick="toggleAccordeon('subcategory-list-{{ $category->id }}')">
                                    <span id="accordion-label-{{ $category->id }}">{{ $category->name }}</span>
                                </button>
                                <div class="subcategory-list" id="subcategory-list-{{ $category->id }}" style="display: none;">
                                    @foreach($category->jobListingCategories as $subCategory)
                                        <!-- Subcategorieën (joblistingcategorieën) -->
                                        <label for="category_id-{{$subCategory->id}}">

                                            <input
                                                type="checkbox"
                                                id="category_id-{{$subCategory->id}}"
                                                name="category_ids[]"
                                                value="{{$subCategory->id}}"
                                                @if(in_array($subCategory->id, old('category_ids', $categoryIds))) checked @endif
                                            >
                                            {{$subCategory->name}}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Categorieën niet gevonden</p>
                    @endforelse

                    <!-- Requirement-sectie -->
                    <div class="requirement-item">
                        <div class="accordion" id="accordion-requirements">
                            <button class="accordion-button" type="button" onclick="toggleAccordeon('requirement-list')">
                                <span id="accordion-label-requirements">Toegankelijkheden</span>
                            </button>
                            <div class="subcategory-list" id="requirement-list" style="display: none;">
                                @foreach($requirements as $requirement)
                                    <label for="requirement_id-{{$requirement->id}}">

                                        <input
                                            type="checkbox"
                                            id="requirement_id-{{$requirement->id}}"
                                            name="requirement_ids[]"
                                            value="{{$requirement->id}}"
                                            @if(in_array($requirement->id, old('requirement_ids', $requirementIds))) checked @endif
                                        >{{$requirement->name}}
                                   </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="button-container">
                        <button type="submit">Toepassen</button>
                        <button type="button" class="reset-btn" id="resetBtn">Verwijderen</button>
                    </div>
                </form>

            </div>
        </div>


        <div class="vacancies">
            <div class="filter-container">
                @foreach($categories as $category)
                    @foreach($category->jobListingCategories as $subCategory)
                        @if(in_array($subCategory->id, $categoryIds))
                            <div class="filters" data-id="{{ $subCategory->id }}">
                                <p>{{ $subCategory->name }}  </p>
                                <span class="remove-filter">×</span>
                            </div>
                        @endif
                    @endforeach
                @endforeach
                @foreach($requirements as $requirement)
                    @if(in_array($requirement->id, $requirementIds))
                        <div class="filters" data-id="{{ $requirement->id }}">
                            <p>{{ $requirement->name }}  </p>
                            <span class="remove-filter">×</span>
                        </div>
                    @endif
                @endforeach
            </div>


            @forelse($jobListings as $job)
                @if(in_array($job->job_listing_category_id, $categoryIds) || empty($categoryIds))

                    @php
                        // Verkrijg de IDs van de vereisten van de job
                        $jobRequirementIds = $job->requirements->pluck('id')->toArray();
                    @endphp

                    @if(array_intersect($jobRequirementIds, $requirementIds) || empty($requirementIds))

                        <div class="vacancy-card">
                            <div class="vacancy-card-content">
                                <img src="{{ asset('/images/bedrijf/bedrijf.png') }}" alt="Vacature afbeelding">
                                <a href="{{ route('joblistings.show', ['id' => $job->id]) }}" class="vacancy-card-link">
                                    <h2> {{ $job->jobListingCategory->name }} -
                                         {{ $job->company->name }}

                                    </h2>
                                    <p><strong>Loon:</strong> €{{ number_format($job->salary, 2) }},- p.m.</p>
                                    <p><strong>Uren:</strong> {{ $job->hours }}</p>
                                    <p><strong>Locatie:</strong> {{ $job->company->place }}</p>
                                    <p><strong>Toegankelijkheden:</strong>
                                        @foreach($job->requirements as $requirement)
                                            {{ $requirement->name }}@if(!$loop->last), @endif
                                        @endforeach
                                    </p>
                                    <p><strong>Plek op wachtlijst:</strong> {{ $job->wachtlijst }}</p>
                                </a>
                            </div>
                            <div class="apply-btn-link">
                                <a href="{{ route('joblistings.show', ['id' => $job->id]) }}">
                                    <button class="apply-btn">Meer informatie</button>
                                </a>
                            </div>
                        </div>
                    @endif
                @endif
            @empty
                <p>Geen vacatures gevonden.</p>
            @endforelse
        </div>
    </div>
</x-layout>
<script>
    // Toggle de zichtbaarheid van subcategorieën
    function toggleSubcategories(categoryId) {
        var subcategoryList = document.getElementById('subcategory-list-' + categoryId);
        var subcategoryButton = document.getElementById('toggle-subcategories-' + categoryId)
        if (subcategoryList.style.display === "none") {
            subcategoryList.style.display = "block";
            subcategoryButton.innerHTML = 'Verberg subcategorien'
        } else {
            subcategoryList.style.display = "none";
            subcategoryButton.innerHTML = 'Toon subcategorien'
        }
    }

    function toggleRequirements() {
        var requirementList = document.getElementById('requirement-list');
        var subcategoryButton = document.getElementById('toggle-requirements');
        if (requirementList.style.display === "none") {
            requirementList.style.display = "block";
            subcategoryButton.innerHTML = 'Verberg requirements'
        } else {
            requirementList.style.display = "none";
            subcategoryButton.innerHTML = 'Verberg requirements'
        }
    }

    // Modal openen en sluiten
    var modal = document.getElementById("myModal");
    var openModalBtn = document.getElementById("openModalBtn");
    var closeModalBtn = document.getElementById("closeModalBtn");

    openModalBtn.onclick = function () {
        modal.style.display = "block";
    }

    closeModalBtn.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Opslaan van de geselecteerde categorie in localStorage
    const categoryCheckboxes = document.querySelectorAll('input[name="category_ids[]"]');
    categoryCheckboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', function () {
            const selectedCategories = Array.from(categoryCheckboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.value);
            localStorage.setItem('selectedCategoryIds', JSON.stringify(selectedCategories));
        });
    });

    // Pre-select de checkboxes op basis van de opgeslagen waarden
    const storedCategoryIds = JSON.parse(localStorage.getItem('selectedCategoryIds') || '[]');
    storedCategoryIds.forEach(id => {
        const checkbox = document.querySelector(`input[name="category_ids[]"][value="${id}"]`);
        if (checkbox) checkbox.checked = true;
    });

    // Reset knop - verwijder alle filters
    const resetBtn = document.getElementById("resetBtn");
    resetBtn.addEventListener("click", function () {
        localStorage.removeItem("selectedCategoryIds"); // Verwijder de opgeslagen filterwaarde
        window.location.href = window.location.pathname; // Vernieuw de pagina om zonder filters weer te geven
    });
    // Toggle de zichtbaarheid van subcategorieën of requirements
    function toggleAccordeon(sectionId) {
        var section = document.getElementById(sectionId);
        var label = document.getElementById('accordion-label-' + sectionId);

        if (section.style.display === "none") {
            section.style.display = "block";
            label.innerHTML = 'Verberg';
            // Voeg actieve klasse toe aan de knop
            document.querySelector('.accordion-button').classList.add('active');
        } else {
            section.style.display = "none";
            label.innerHTML = 'Toon';
            // Verwijder actieve klasse van de knop
            document.querySelector('.accordion-button').classList.remove('active');
        }
    }
    document.addEventListener('DOMContentLoaded', function () {
        const filters = document.querySelectorAll('.filters');
        const categoryCheckboxes = document.querySelectorAll('input[name="category_ids[]"]');
        const requirementCheckboxes = document.querySelectorAll('input[name="requirement_ids[]"]');

        filters.forEach(filter => {
            filter.addEventListener('click', function () {
                const filterId = this.getAttribute('data-id');

                // Zoek de checkbox die overeenkomt met het filter ID
                const categoryCheckbox = document.querySelector(`input[name="category_ids[]"][value="${filterId}"]`);
                const requirementCheckbox = document.querySelector(`input[name="requirement_ids[]"][value="${filterId}"]`);

                if (categoryCheckbox) {
                    categoryCheckbox.checked = false; // Deselecteer de checkbox
                }

                if (requirementCheckbox) {
                    requirementCheckbox.checked = false; // Deselecteer de checkbox
                }

                // Verwijder het filter ID uit localStorage
                let selectedCategories = JSON.parse(localStorage.getItem('selectedCategoryIds') || '[]');
                selectedCategories = selectedCategories.filter(id => id !== filterId);
                localStorage.setItem('selectedCategoryIds', JSON.stringify(selectedCategories));

                // Hernieuw de pagina om de filters toe te passen
                document.getElementById('filter-form').submit();
            });
        });
    });
    window.addEventListener('beforeunload', () => {
        localStorage.clear();
    });


</script>

