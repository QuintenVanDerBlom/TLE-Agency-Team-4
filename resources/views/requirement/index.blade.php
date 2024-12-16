<x-layout>
    <style>
        .back-button img {
            left: 0.5rem;
        }
    </style>
    <div class="cat-container">
        <div id="stap2" class="header-container">
            <a href="javascript:void(0);" onclick="window.history.back();" class="back-button">
                <img src="{{ asset('/images/backarrow.png') }}" alt="back-button">
            </a>
            <h1 class="centered-text">Toegankelijkheden</h1>
        </div>

        <p class="information">
            Heeft u bepaalde toegankelijkheden waar de werkgever rekening mee moet houden?
        </p>

        <!-- 'Nee, ga verder' knop -->
        <form action="{{ route('joblistings.index') }}" method="GET">
            @csrf
            <!-- Voeg de geselecteerde category_ids[] toe aan verborgen velden -->
            @foreach(request('category_ids', []) as $categoryId)
                <input type="hidden" name="category_ids[]" value="{{ $categoryId }}">
            @endforeach
            <button type="submit" class="reset-btn" id="resetBtn">Nee, ga verder</button>
        </form>

        <section class="checkbox-container">
            <!-- Formulier om de vereisten te selecteren en door te geven naar joblistings.index -->
            <form action="{{ route('joblistings.index') }}" method="GET">
                @csrf

                <!-- Voeg de geselecteerde category_ids[] toe aan verborgen velden -->
                @foreach(request('category_ids', []) as $categoryId)
                    <input type="hidden" name="category_ids[]" value="{{ $categoryId }}">
                @endforeach

                <!-- Toggle knop voor accordeon -->
                <button type="button" class="accordion-button">Toegankelijkheden Selecteren</button>

                <!-- Requirements Checkboxes (geklapt op start) -->
                <div class="accordion-content">
                    @foreach($requirements as $requirement)
                        <section class="checkbox-item">
                            <input type="checkbox" id="requirement-{{ $requirement->id }}" name="requirement_ids[]" value="{{ $requirement->id }}">
                            <label for="requirement-{{ $requirement->id }}">{{ $requirement->name }}</label>
                        </section>
                    @endforeach

                    <!-- Submit Button binnen het accordeon menu -->
                    <section class="button">
                        <button type="submit" class="job-action">Vacatures bekijken</button>
                    </section>
                </div>

            </form>
        </section>

    </div>

    <script>
        // JavaScript voor het in- en uitklappen van het accordeon
        document.addEventListener('DOMContentLoaded', function() {
            const accordionButton = document.querySelector('.accordion-button');
            const accordionContent = document.querySelector('.accordion-content');

            accordionButton.addEventListener('click', function() {
                // Toggle de zichtbaarheid van de accordion-content
                if (accordionContent.style.display === 'block') {
                    accordionContent.style.display = 'none';
                } else {
                    accordionContent.style.display = 'block';
                }
            });
        });
    </script>

</x-layout>
