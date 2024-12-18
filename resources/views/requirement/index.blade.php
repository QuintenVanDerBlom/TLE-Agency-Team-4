<x-layout>
    <style>
        .back-button img {
            left: 0.5rem;
        }
        .accordion-button{
            width: 90vw;
            background-color: #4CAF50;
            margin-bottom: 1rem;
        }
        button[type="submit"]{
            background-color: red;
            width: 90vw;
            align-self: center;
        }
        .checkbox-container{
            padding: 0;
        }
        form{
            align-items: center;
        }
        #green{
            background-color: #4CAF50;
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

        <!-- Informational text -->
        <p class="information">
            Heeft u bepaalde toegankelijkheden waar de werkgever rekening mee moet houden?
        </p>

        <!-- 'Nee, ga verder' knop -->

{{--        --}}

        <!-- Checkbox container for requirements -->
        <section class="checkbox-container">
            <form action="{{ route('joblistings.index') }}" method="GET" class="requirements-form">
                @csrf
                <!-- Retain the selected category IDs -->
                @foreach(request('category_ids', []) as $categoryId)
                    <input type="hidden" name="category_ids[]" value="{{ $categoryId }}">
                @endforeach

                <!-- Accordion toggle button -->
                <button type="button" class="accordion-button" aria-expanded="false" aria-controls="requirements-accordion">
                    Ja, toegankelijkheden selecteren
                </button>

                <!-- Accordion content with checkboxes -->
                <div id="requirements-accordion" class="accordion-content" style="display: none;">
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

                    <!-- Submit button within accordion menu -->
                        <button type="submit" class="accent-green-500" id="green">Naar Vacatures</button>
                </div>
            </form>
        </section>
    </div>
    <form action="{{ route('joblistings.index') }}" method="GET" class="next-form">
        @csrf
        <!-- Retain the selected category IDs -->
        @foreach(request('category_ids', []) as $categoryId)
            <input type="hidden" name="category_ids[]" value="{{ $categoryId }}">
        @endforeach
        <button type="submit" class="reset-btn" id="resetBtn">Nee, ga verder</button>
    </form>
    <script>
        // JavaScript voor het in- en uitklappen van het accordeon
        document.addEventListener('DOMContentLoaded', function() {
            const accordionButton = document.querySelector('.accordion-button');
            const accordionContent = document.querySelector('.accordion-content');

            accordionButton.addEventListener('click', function() {
                // Toggle de zichtbaarheid van de accordion-content
                if (accordionContent.style.display === 'flex') {
                    accordionContent.style.display = 'none';
                } else {
                    accordionContent.style.display = 'flex';
                    accordionContent.style.flexDirection = 'column';
                    accordionContent.style.width = '90vw';
                }
            });
        });
    </script>

</x-layout>
