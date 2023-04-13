<x-layout>

    <h2>boekjaren</h2>
    @auth
        <div class="kaart-container">

            @unless (count($boekjaren) == 0)
                @foreach ($boekjaren as $boekjaar)
                    <div class="kaart">
                        <p>boekjaar: {{ $boekjaar->jaartal }}</p>
                        <p>basiscontributie: {{ $boekjaar->basiscontributie }}</p>
                        <div class="knop">
                            <a href="/boekjaren/{{ $boekjaar->id }}/edit">Bewerk boekjaar {{ $boekjaar->omschrijving }}</a>
                        </div>
                        <form method="POST" action="/boekjaren/{{ $boekjaar->id }}">
                            @csrf
                            @method('DELETE')
                            <div class="knop">
                                <button>
                                    Delete boekjaar {{ $boekjaar->omschrijving }}
                                </button>
                            </div>
                        </form>
                    </div>
                @endforeach
                <div class="knop">
                    <a href="/boekjaren/create">boekjaar aanmaken</a>
                </div>
            @else
                <p>Geen boekjaren gevonden</p>
            @endunless
        </div>
    @endauth

</x-layout>
