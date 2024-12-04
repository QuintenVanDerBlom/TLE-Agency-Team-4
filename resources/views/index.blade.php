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
        <div id="lp-button-div">
            <a href="{{ route('categories.index') }}" id="lp-button">Bekijk Vacatures</a>
        </div>
    </section>
</x-layout>
