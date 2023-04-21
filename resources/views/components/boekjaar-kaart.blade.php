<div class="kaart">
    <p>boekjaar: {{ $boekjaar->jaartal }}</p>
    <p>basiscontributie: € {{ $boekjaar->basiscontributie }}</p>
    <div class="knop">
        <a href="/boekjaren/{{ $boekjaar->id }}/edit">Bewerk boekjaar</a>
    </div>
    <form method="POST" action="/boekjaren/{{ $boekjaar->id }}">
        @csrf
        @method('DELETE')
        <div class="knop">
            <button class=danger>
                Delete boekjaar {{ $boekjaar->omschrijving }}
            </button>
        </div>
    </form>
</div>

</div>
