<div class="kaart">
    <p>boekjaar: {{ $boekjaar->jaartal }}</p>
    <p>basiscontributie: {{ $boekjaar->basiscontributie }}</p>
    <x-facturen :facturen="$boekjaar->facturen" />
    <div class="link">
        <a href="/boekjaren/{{ $boekjaar->id }}/edit">Bewerk boekjaar</a>
    </div>
    <form method="POST" action="/boekjaren/{{ $boekjaar->id }}">
        @csrf
        @method('DELETE')
        <div class="link">
            <button>
                Delete boekjaar {{ $boekjaar->omschrijving }}
            </button>
        </div>
    </form>
</div>

</div>
