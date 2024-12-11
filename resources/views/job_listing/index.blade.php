<x-layout>
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
            width: 90vw;
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
            text-decoration: none;
            color: inherit;
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
            width: 100%;
            text-align: center;
        }

        .apply-btn:hover {
            background-color: #2a3423;
        }

        .header {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .back-arrow {
            width: 30px;
            height: 30px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .back-arrow:hover {
            transform: scale(1.1);
        }

        /* De achtergrond van de modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .open-modal-btn {
            padding: 10px 20px;
            background-color: #313D29;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .open-modal-btn:hover {
            background-color: #2a3423;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .reset-btn {
            padding: 10px 20px;
            background-color: #FF4B4B;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .reset-btn:hover {
            background-color: #e64343;
        }

        .subcategory-list {
            display: none; /* Subcategorieën zijn standaard verborgen */
            margin-top: 10px;
            padding-left: 20px;
        }

        .toggle-subcategories {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #313D29;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .toggle-subcategories:hover {
            background-color: #2a3423;
        }
    </style>

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
            <h3>Gekozen filters</h3>
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
