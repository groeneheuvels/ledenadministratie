<x-layout>

    <h2>Lidsoorten</h2>
    @auth
        <div class="kaart-container">

            @unless (count($lidsoorten) == 0)
                @foreach ($lidsoorten as $lidsoort)
                    <div class="kaart">
                        <p>Lidsoort: {{ $lidsoort->omschrijving }}</p>
                        <p>Contributiefactor: {{ $lidsoort->contributiefactor }}</p>
                        <div class="link">
                            <a href="/lidsoorten/{{ $lidsoort->id }}/edit">Bewerk Lidsoort {{ $lidsoort->omschrijving }}</a>
                        </div>
                        <form method="POST" action="/lidsoorten/{{ $lidsoort->id }}">
                            @csrf
                            @method('DELETE')
                            <div class="link">
                                <button>
                                    Delete Lidsoort {{ $lidsoort->omschrijving }}
                                </button>
                            </div>
                        </form>
                    </div>
                @endforeach
                <div class="link">
                    <a href="/lidsoorten/create">Lidsoort aanmaken</a>
                </div>
            @else
                <p>Geen lidsoorten gevonden</p>
            @endunless
        </div>
    @endauth

</x-layout>
