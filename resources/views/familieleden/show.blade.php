<x-layout>
    <h2>Familielid {{ $familielid->firstname }}</h2>
    <div class="kaart-container">
        <div class="kaart">
            <p>{{ $familielid->firstname }} <a href="/families/{{ $familie['id'] }}"> {{ $familie->lastname }}</a></p>
            <p>Soort lid: {{ $familielid->lidsoort->omschrijving }} </p>
            @auth
                <p>Geboortedatum: {{ $familielid->geboortedatum }} </p>
                <p>Adres: {{ $familie->address }}</p>
            @endauth
        </div>
    </div>
    @auth
        <div class="kaart-container">
            <div class="kaart">
                <div class="form-field"><a class="knop" href="/familieleden/{{ $familielid->id }}/edit">Bewerk Familielid</a>
                </div>
                <form method="POST" action="/familieleden/{{ $familielid->id }}">
                    @csrf
                    @method('DELETE')
                    <div class="form-field">
                        <button class="danger">
                            Delete Familielid {{ $familielid->firstname }} {{ $familie->lastname }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endauth
</x-layout>
