<div class="kaart">
    <p>boekjaar: {{ $boekjaar->jaartal }}</p>
    <p>basiscontributie: € {{ $boekjaar->basiscontributie }}</p>

    <div class="form-field"><a class="knop" href="/boekjaren/{{ $boekjaar->id }}/edit">Bewerk boekjaar</a></div>

    <form method="POST" action="/boekjaren/{{ $boekjaar->id }}">
        @csrf
        @method('DELETE')

        <div class="form-field">
            <button class=danger>
                Delete boekjaar {{ $boekjaar->omschrijving }}
            </button>
        </div>

    </form>
</div>

</div>
