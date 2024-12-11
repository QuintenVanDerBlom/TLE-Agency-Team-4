<x-layout>
    <div class="cat-container">
        <div id="stap2" class="header-container">
            <a href="{{ route('index') }}" class="back-button">
                <img src="{{ asset('/images/backarrow.png') }}" alt="back-button">
            </a>
            <h1 class="centered-text">Categorie</h1>
        </div>
        <h3 class="title">
            Stap 3: Geef wat extra informatie over jezelf
        </h3>

        <p class="clarification">
            Deze informatie is alleen bedoeld zodat we de vacatures voor jou kunnen filteren.
        </p>

        <hr class="seperation" />

        <p class="information">
            Heb je een beperking die een werkgever in de gaten moet houden? (Meerdere antwoorden mogelijk)
        </p>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <section class="checkbox-container">
            <!-- Formulier om de vereisten te selecteren en door te geven naar joblistings.index -->
            <form action="{{ route('joblistings.index') }}" method="GET">
                @csrf

                <!-- Voeg de geselecteerde category_ids[] toe aan verborgen velden -->
                @foreach(request('category_ids', []) as $categoryId)
                    <input type="hidden" name="category_ids[]" value="{{ $categoryId }}">
                @endforeach

                <!-- Requirements Checkboxes -->
                @foreach($requirements as $requirement)
                    <section class="checkbox-item">
                        <input type="checkbox" id="requirement-{{ $requirement->id }}" name="requirement_ids[]" value="{{ $requirement->id }}">
                        <label for="requirement-{{ $requirement->id }}">{{ $requirement->name }}</label>
                    </section>
                @endforeach

                <!-- Submit Button -->
                <section class="button">
                    <button type="submit" class="job-action">Vacatures bekijken</button>
                </section>

            </form>
        </section>
    </div>
</x-layout>
