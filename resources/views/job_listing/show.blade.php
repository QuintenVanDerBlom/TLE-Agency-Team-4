  <x-layout>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <style>
        #map {
            height: 20vh; /* Stel de hoogte van de kaart in */
            margin-top: 1em;
            width: 100%;
            border: 1px solid #ddd; /* Optioneel voor visuele structuur */
            border-radius: 0.2rem;
        }
        .back-button img {
            left: -3.3rem;                        /* Helemaal links */
        }
    </style>

    <section class="confirmation-center">
        <div class="cat-container">
            <div id="stap2" class="header-container">
                <a href="javascript:history.back()" class="back-button">
                    <img src="{{ asset('/images/backarrow.png') }}" alt="back-button">
                </a>
                <h1 class="centered-text">Bevestiging</h1>
            </div>
        <h2>{{ $jobListing->company->name }}</h2>
        <h3>{{ $jobListing->name }}</h3>

        <div class="underline-box">
            <p>Overzicht</p>
                <li>Gemiddeld {{ $jobListing->hours }} uur per week</li>
                <li>€{{ number_format($jobListing->salary / ($jobListing->hours * 7), 2) }} gemiddeld per uur (afhankelijk van leeftijd)</li>
{{--                <li>Bijzonderheden: {{ $jobListing->details }}</li>--}}
{{--                <li>Taken: {{ $jobListing->tasks }}</li>--}}
        </div>

        <div class="underline-box">
            <p>Locatie</p>
            <div id="map"></div>
        </div>
        <div class="underline-box">
            <h3>Wat gaat er nu gebeuren</h3>
            <li>
                Door op de knop te drukken, kom je op de wachtlijst te staan.</li>
                <li>Je ontvangt een bevestigingsmail van je inschrijving.</li>
                <li>Je inschrijving wordt zichtbaar onder "Jouw inschrijvingen".</li>
                <li>Hier kun je ook je plaats op de wachtlijst zien</li>
               <li> Bij acceptatie ontvang je een e-mail om de baan officieel te accepteren.</li>
        </div>
        </div>
        <form action="{{ route('jobapplication.store', ['job_id' => $jobListing->id]) }}" method="POST">
            @csrf
            <input type="hidden" name="job_id" value="{{ $jobListing->id }}">
            <button type="submit">Schrijf je in voor de vacature</button>
        </form>

    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log("Map script is running");

            // Coördinaten ophalen en opsplitsen
            var locationString = "{{ $jobListing->company->location }}"; // "52.370216, 4.895168"
            var coordinates = locationString.split(','); // ['52.370216', '4.895168']
            var lat = parseFloat(coordinates[0].trim()); // Converteer naar float en verwijder spaties
            var lng = parseFloat(coordinates[1].trim());

            // Maak een Leaflet-kaart
            var map = L.map('map').setView([lat, lng], 13);

            // Voeg OpenStreetMap-tiles toe
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Voeg een marker toe
            // Voeg een marker toe
            // Voeg een marker toe
            var marker = L.marker([lat, lng]).addTo(map);

// Haal het adres op via de Nominatim API (omgekeerde geocodering)
            fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`)
                .then(response => response.json())
                .then(data => {
                    // Haal relevante onderdelen uit de API response
                    var address = data.address;
                    var displayAddress = '';

                    // Specificeer wat je wilt weergeven (bijv. geen dubbele landen)
                    if (address.road) {
                        displayAddress += address.road + ', ';
                    }
                    if (address.city) {
                        displayAddress += address.city + ', ';
                    }
                    if (address.state) {
                        displayAddress += address.state + ', ';
                    }
                    if (address.country) {
                        displayAddress += address.country;
                    }

                    // Maak de Google Maps link
                    var googleMapsLink = `https://www.google.com/maps/place/${lat},${lng}`;

                    // Voeg de Google Maps link en het aangepaste adres toe aan de marker
                    marker.bindPopup(`
            <b>{{ $jobListing->name }}</b><br>
            ${displayAddress}<br>
            <a href="${googleMapsLink}" target="_blank">Bekijk op Google Maps</a>
        `).openPopup();
                })
                .catch(error => {
                    console.error('Error getting address:', error);
                    marker.bindPopup('<b>{{ $jobListing->name }}</b><br>Adres niet gevonden.<br><a href="https://www.google.com/maps/place/${lat},${lng}" target="_blank">Bekijk op Google Maps</a>').openPopup();
                });

        });
    </script>
</x-layout>
