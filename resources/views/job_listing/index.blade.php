<x-layout>
    <div class="cat-container">
        <div id="stap2" class="header-container">
            <a href="{{ route('requirement.index') }}" class="back-button">
                <img src="{{ asset('/images/backarrow.png') }}" alt="back-button">
            </a>
            <h1 class="centered-text">Vacatures</h1>
        </div>
        <button class="open-modal-btn" id="openModalBtn">Filter</button>

        <!-- Searchbar -->
            <form action="{{ route('joblistings.index') }}" method="GET">
                <label for="search" class="text-gray-800 font semibold"></label>
                <input type="text" name="search" placeholder="Search">
                <button type="submit">Search</button>
            </form>


        <!-- De Modal -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" id="closeModalBtn">&times;</span>
                <form id="filter-form" method="GET" action="">
                    @forelse($categories as $category)
                        <!-- Hoofdcategorieën -->
                        <div class="category-item">
                            <p><strong>{{ $category->name }}</strong></p>
                            <div class="subcategory-list" id="subcategory-list-{{ $category->id }}"
                                 style="display:none;">
                                @foreach($category->jobListingCategories as $subCategory)
                                    <!-- Subcategorieën (joblistingcategorieën) -->
                                    <label for="category_id-{{$subCategory->id}}">
                                        {{$subCategory->name}}
                                        <input
                                            type="checkbox"
                                            id="category_id-{{$subCategory->id}}"
                                            name="category_ids[]"
                                            value="{{$subCategory->id}}"
                                            @if(in_array($subCategory->id, old('category_ids', $categoryIds))) checked @endif
                                        >
                                    </label>
                                @endforeach
                            </div>
                            <button type="button" class="toggle-subcategories"
                                    id="toggle-subcategories-{{$category->id}}"
                                    onclick="toggleSubcategories({{ $category->id }})">
                                Toon Subcategorieën
                            </button>
                        </div>
                    @empty
                        <p>Categorieën niet gevonden</p>
                    @endforelse
                    <div class="requirement-item">
                        <p><strong>Requirements</strong></p>
                        <div class="requirement-list" id="requirement-list" style="display:none;">
                            @foreach($requirements as $requirement)
                                <!-- Subcategorieën (joblistingcategorieën) -->
                                <label for="requirement_id-{{$requirement->id}}">
                                    {{$requirement->name}}
                                    <input
                                        type="checkbox"
                                        id="requirement_id-{{$requirement->id}}"
                                        name="requirement_ids[]"
                                        value="{{$requirement->id}}"
                                        @if(in_array($requirement->id, old('requirement_ids', $requirementIds))) checked @endif
                                    >
                                </label>
                            @endforeach
                        </div>
                        <button type="button" class="toggle-requirements" id="toggle-requirements"
                                onclick="toggleRequirements()">
                            Toon Requirements
                        </button>
                    </div>
                    <button type="submit">Toepassen</button>
                    <!-- Reset knop voor filters -->
                    <button type="button" class="reset-btn" id="resetBtn">Reset Filters</button>
                </form>
            </div>
        </div>

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
        </script>

        <div class="vacancies">
            <div class="filters">
            <p>Gekozen filters: </p>
                @foreach($categories as $category)
                    @foreach($category->jobListingCategories as $subCategory)
                        @if(in_array($subCategory->id, $categoryIds))
                            <!-- Toon de geselecteerde subcategorieën -->
                            <p>{{ $subCategory->name }}</p>
                        @endif
                    @endforeach
              @endforeach
                @foreach($requirements as $requirement)
                    @if(in_array($requirement->id, $requirementIds))
                        <!-- Toon de geselecteerde subcategorieën -->
                        <p>{{ $requirement->name }}</p>
                    @endif
              @endforeach
            </div>
                @forelse($jobListings as $job)
                    @if(in_array($job->job_listing_category_id, $categoryIds) || empty($categoryIds))
                        @if(in_array($job->job_listing_requirement_id, $requirementIds) || empty($requirementIds))

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
                    @endif
                @endif
            @empty
                <p>Geen vacatures gevonden.</p>
            @endforelse
        </div>
    </div>
</x-layout>
