<div class="kaart">
    <h3>
        <a href="/families/{{ $familie->id }}"> Familie {{ $familie->lastname }}</a>
    </h3>
    @auth
        <p>{{ $familie->address }}</p>
        <p>{{ $familie->postcode }} {{ $familie->city }}</p>
    @endauth
    <x-familie-leden :familieleden="$familie->familieleden" />
    @auth
        <x-facturen :facturen="$familie->facturen" />
    @endauth
</div>
