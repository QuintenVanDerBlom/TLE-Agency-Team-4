<x-layout>
    <div id="stap2" class="header-container">
        <a href="javascript:history.back()" class="back-button">
            <img src="{{ asset('/images/backarrow.png') }}" alt="back-button">
        </a>
        <h1 class="centered-text">Categorie</h1>
    </div>
    <h3 class="title">
        Stap 3: Geef wat extra informatie over jezelf</h3>

    <p class="clarification">
        Deze informatie is alleen bedoeld zodat we de vacatures voor jouw kan filteren.</p>

    <hr class="seperation" />

    <p class="information">
        Heb je een beperking die een werkgever in de gaten moet houden? (Meerdere antwoorden mogelijk)</p>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <section class="selections-container">
        <form action= "{{route('filter-vacatures')}}" method="POST">
            @csrf
            <p>Heb je een rijbewijs?</p>
            <section class="radio-container">
                <input type="radio" id="license-yes" name="has_drivers_license" value="license-yes">
                <label for="license-yes">Ja</label>

                <input type="radio" id="license-no" name="has_drivers_license" value="license-no">
                <label for="license-no">Nee</label>
            </section>

            <hr class="seperation" />
            <section class="checkbox-item">
                <input type="checkbox" id="visuele-beperking" name="keuze[]" value="Visuele beperking">
                <label for="visuele-beperking">Visuele Beperking</label>
            </section>

            <section class="checkbox-item">
                <input type="checkbox" id="auditieve-beperking" name="keuze[]" value="Auditieve beperking">
                <label for="auditieve-beperking">Auditieve Beperking</label>
            </section>

            <section class="checkbox-item">
                <input type="checkbox" id="cognitief-of-leerstoornis" name="keuze[]" value="Cognitieve beperking of Leerstoornis">
                <label for="cognitief-of-leerstoornis">Cognitieve beperking of Leerstoornis</label>
            </section>

            <section class="checkbox-item">
                <input type="checkbox" id="psychische-beperking" name="keuze[]" value="Psychische beperking">
                <label for="psychische-beperking">Psychische Beperking</label>
            </section>

            <section class="checkbox-item">
                <input type="checkbox" id="motorische-beperking" name="keuze[]" value="Motorische beperking">
                <label for="motorische-beperking">Motorische beperking</label>
            </section>

            <section class="checkbox-item">
                <input type="checkbox" id="spraak-of-communicatiestoornis" name="keuze[]" value="Spraak of Communicatiestoornis">
                <label for="spraak-of-communicatiestoornis">Spraak of Communicatiestoornis</label>
            </section>

            <section class="checkbox-item">
                <input type="checkbox" id="verstandelijke-beperking" name="keuze[]" value="Verstandelijke beperking">
                <label for="verstandelijke-beperking">Verstandelijke beperking</label>
            </section>

            <section class="checkbox-item">
                <input type="checkbox" id="chronische-ziekte-of-pijn" name="keuze[]" value="Chronische Ziekte of Pijn">
                <label for="chronische-ziekte-of-pijn">Chronische Ziekte of Pijn</label>
            </section>

            <section class="checkbox-item">
                <input type="checkbox" id="neurologische-aandoeningen" name="keuze[]" value="Neurologische Aandoeningen">
                <label for="neurologische-aandoeningen">Neurologische Aandoeningen</label>
            </section>

            <section class="checkbox-item">
                <input type="checkbox" id="sensorische-stoornis" name="keuze[]" value="Sensorische Stoornis">
                <label for="sensorische-stoornis">Sensorische Stoornis</label>
            </section>

            <section class="checkbox-item">
                <input type="checkbox" id="amputaties-of-ledemaatafwijking" name="keuze[]" value="Amputaties of Ledemaatafwijking">
                <label for="amputaties-of-ledemaatafwijking">Amputaties of Ledematenafwijking</label>
            </section>

            <section class="checkbox-item">
                <input type="checkbox" id="verbogen-beperking" name="keuze[]" value="Verborgen beperking">
                <label for="verbogen-beperking">Verborgen Beperking</label>
            </section>

            <section class="button">
                <button type="submit" class="job-action">Vacatures bekijken</button>
            </section>


        </form>
    </section>
</x-layout>
