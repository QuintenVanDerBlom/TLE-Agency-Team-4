<x-layout>
    <style>
        .back-button img {
            left: 0.5rem;
        }
    </style>

    <!-- Main content container -->
    <div class="cat-container">

        <!-- Header section with back button and title -->
        <header id="stap2" class="header-container">
            <a href="javascript:void(0);" onclick="window.history.back();" class="back-button" aria-label="Back">
                <img src="{{ asset('/images/backarrow.png') }}" alt="Back button" />
            </a>
            <h1 class="centered-text">Toegankelijkheden</h1>
        </header>

        <!-- Radio button selection for driver's license -->
        <section class="selections-container">
            <p class="information">Heb je een rijbewijs?</p>
            <section class="radio-container">
                <input type="radio" id="license-yes" name="has_drivers_license" value="yes">
                <label for="license-yes">Ja</label>

                <input type="radio" id="license-no" name="has_drivers_license" value="no">
                <label for="license-no">Nee</label>
            </section>
        </section>

        <!-- Informational text -->
        <p class="information">
            Heeft u bepaalde toegankelijkheden waar de werkgever rekening mee moet houden?
        </p>

        <!-- Form for filtering -->
        <form action="{{ route('joblistings.index') }}" method="GET" class="filter-form">
            @csrf

            <!-- Retain the selected category IDs -->
            @foreach(request('category_ids', []) as $categoryId)
                <input type="hidden" name="category_ids[]" value="{{ $categoryId }}">
            @endforeach



            <!-- Checkbox container for requirements -->
            <section class="checkbox-container">
                <!-- Accordion toggle button -->
                <button type="button" class="accordion-button" aria-expanded="false" aria-controls="requirements-accordion">
                    Toegankelijkheden Selecteren
                </button>

                <!-- Accordion content with checkboxes -->
                <div id="requirements-accordion" class="accordion-content">
                    @foreach($requirements as $requirement)
                        <div class="checkbox-item">
                            <input
                                type="checkbox"
                                id="requirement-{{ $requirement->id }}"
                                name="requirement_ids[]"
                                value="{{ $requirement->id }}"
                                class="checkbox-input"
                                aria-labelledby="requirement-label-{{ $requirement->id }}"
                            />
                            <label for="requirement-{{ $requirement->id }}" id="requirement-label-{{ $requirement->id }}" class="checkbox-label">
                                {{ $requirement->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </section>

            <!-- Submit button -->
            <section class="button">
                <button type="submit" class="job-action">Naar Vacatures</button>
            </section>
        </form>
    </div>

    <script>
        // JavaScript for toggling accordion content
        document.addEventListener('DOMContentLoaded', function() {
            const accordionButton = document.querySelector('.accordion-button');
            const accordionContent = document.querySelector('.accordion-content');

            accordionButton.addEventListener('click', function() {
                accordionContent.style.display = accordionContent.style.display === 'block' ? 'none' : 'block';
            });
        });
    </script>
</x-layout>
