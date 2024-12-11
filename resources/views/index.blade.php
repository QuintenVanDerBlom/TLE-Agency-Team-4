<x-layout>
    <img id="banner-image" src="{{ asset("/images/banner.png") }}" alt="banner image">

    <section id="lp-maincontent">
        <div id="lp-button-div">
            <a href="{{ route('categories.index') }}" id="lp-button" class = "homepage-button" aria-label="Bekijk vacatures">Vind de juiste vacature voor jou!</a>
        </div>
        <h1>Werk voor iedereen!</h1>
        <div class="lp-container">
            <div class="lp-item">
                <p class="circle-text">Direct reageren. Zonder sollicitatiegesprek, vragen of (voor)oordelen. Een eerlijke kans.</p>
            </div>
            <div class="lp-item right-align">
                <p class="circle-text">Jij bepaalt of je het kunt</p>
            </div>
            <div class="lp-item">
                <p class="circle-text">Snel aan de slag. Met een normaal contract, vanaf dag 1 betaald.</p>
            </div>
        </div>
    </section>

    <section id="random-job-postings">
        <h1> Vacatures</h1>
            @foreach($randomJobListings as $job)
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
            @endforeach
        <h3>Klik op de knop voor alle vacatures.</h3>
    </section>
    <div id="lp-button-div">
        <a href="{{ route('joblistings.index') }}" id="lp-button" aria-label="Bekijk alle vacatures">Bekijk alle vacatures</a>
    </div>


</x-layout>
