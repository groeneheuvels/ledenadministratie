<div class="kaart">
    <h3>
        <a href="/families/{{ $familie->id }}"> {{ $familie->lastname }}</a>
    </h3>
    {{-- <p>Familie contributie : &euro; {{ $totalContributiebedrag }}</p> --}}
    <p>{{ $familie->address }}</p>
    <p>{{ $familie->postcode }} {{ $familie->city }}</p>
    <x-familie-leden :familieleden="$familie->familieleden" />
    <x-facturen :facturen="$familie->facturen" />
</div>
