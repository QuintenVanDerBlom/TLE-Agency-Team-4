<x-layout>
    <img id="banner-image" src="{{ asset("/images/banner.png") }}" alt="banner image">

    <section id="lp-maincontent">
        <h1>Werk voor iedereen!</h1>
        <div class="lp-item">
            <p class="circle-text">Direct reageren. Zonder sollicitatiegesprek, vragen of (voor)oordelen. Een eerlijke kans.</p>
        </div>
        <div class="lp-item right-align">
            <p class="circle-text">Jij bepaalt of je het kunt</p>
        </div>
        <div class="lp-item">
            <p class="circle-text">Snel aan de slag. Met een normaal contract, vanaf dag 1 betaald.</p>
        </div>
    </section>

    <section id="random-job-postings">
        <h2> Willekeurige Vacatures</h2>
        <ul>
            @foreach($randomJobListings as $job)
                <li>
                    <h3> Baan titel:{{ $job->name }}</h3>
                    <p> Salaris: {{ $job->salary }}</p>
                    <p>Uren: {{ $job->hours }}</p>
                    <a href="{{ route('joblistings.show', $job->id) }}">Meer Details</a>

                </li>
            @endforeach
        </ul>
    </section>
    <h2>Voor meerdere vacatures kan je de knop drukken</h2>
    <div id="lp-button-div">
        <a href="{{ route('joblistings.index') }}" id="lp-button">Bekijk Vacatures</a>
    </div>
</x-layout>
