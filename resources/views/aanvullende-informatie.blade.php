<x-layout>

    <form action= "{{route('aanvullende-informatie')}}" method="POST">
    @csrf
    <input type="radio" id="visuele-beperking" name="keuze" value="Visuele beperking">
    <label for="visuele-beperking">Visuele Beperking</label>

    <input type="radio" id="auditieve-beperking" name="keuze" value="Auditieve beperking">
    <label for="auditieve-beperking">Auditieve Beperking</label>

    <input type="radio" id="cognitief-of-leerstoornis" name="keuze" value="Cognitieve beperking of Leerstoornis">
    <label for="cognitief-of-leerstoornis">Cognitieve beperking of Leerstoornis</label>

    <input type="radio" id="psychische-beperking" name="keuze" value="Psychische beperking">
    <label for="psychische-beperking">Psychische Beperking</label>

    <input type="radio" id="motorische-beperking" name="keuze" value="Motorische beperking">
    <label for="motorische-beperking">Motorische beperking</label>

    <input type="radio" id="spraak-of-communicatiestoornis" name="keuze" value="Spraak of Communicatiestoornis">
    <label for="spraak-of-communicatiestoornis">Spraak of Communicatiestoornis</label>

    <input type="radio" id="verstandelijke-beperking" name="keuze" value="Verstandelijke beperking">
    <label for="verstandelijke-beperking">Visuele Beperking</label>

    <input type="radio" id="chronische-ziekte-of-pijn" name="keuze" value="Chronische Ziekte of Pijn">
    <label for="chronische-ziekte-of-pijn">Chronische Ziekte of Pijn</label>

    <input type="radio" id="neurologische-aandoeningen" name="keuze" value="Neurologische Aandoeningen">
    <label for="neurologische-aandoeningen">Neurologische Aandoeningen</label>

    <input type="radio" id="sensorische-stoornis" name="keuze" value="Sensorische Stoornis">
    <label for="sensorische-stoornis"></label>

    <input type="radio" id="amputaties-of-ledemaatafwijking" name="keuze" value="Amputaties of Ledemaatafwijking">
    <label for="amputaties-of-ledemaatafwijking">Amputaties of Ledematenafwijking</label>

    <input type="radio" id="verbogen-beperking" name="keuze" value="Verborgen beperking">
    <label for="verbogen-beperking">Verborgen Beperking</label>

    <input type="submit" value="Volgende">
    </form>
</x-layout>
