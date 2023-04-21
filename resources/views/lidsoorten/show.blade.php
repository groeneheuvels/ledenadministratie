<x-layout>

    <h2>Lidsoorten</h2>
    @auth
        <div class="kaart-container">

            @unless (count($lidsoorten) == 0)
                @foreach ($lidsoorten as $lidsoort)
                    <div class="kaart">
                        <p>Lidsoort: {{ $lidsoort->omschrijving }}</p>
                        <p>Contributiefactor: {{ $lidsoort->contributiefactor }}</p>

                        <div class="form-field"><a class="knop" href="/lidsoorten/{{ $lidsoort->id }}/edit">Bewerk Lidsoort
                                {{ $lidsoort->omschrijving }}</a></div>

                        <form method="POST" action="/lidsoorten/{{ $lidsoort->id }}">
                            @csrf
                            @method('DELETE')

                            <div class="form-field">
                                <button class="danger">
                                    Delete Lidsoort {{ $lidsoort->omschrijving }}
                                </button>
                            </div>

                        </form>
                    </div>
                @endforeach
            @else
                <p>Geen lidsoorten gevonden</p>
            @endunless

        </div>

        <div class="kaart-container">
            <div class="kaart">

                <a class="knop" href="/lidsoorten/create">Lidsoort aanmaken</a>
            </div>
        </div>
    @endauth

</x-layout>
