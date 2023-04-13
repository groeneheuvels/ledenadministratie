<x-layout>

    <div class="kaart">
        <p>{{ $familielid->firstname }} <a href="/families/{{ $familie['id'] }}"> {{ $familie->lastname }}</a></p>
        <p>Soort lid: {{ $familielid->lidsoort->omschrijving }} </p>
        <p>Geboortedatum: {{ $familielid->geboortedatum }} </p>
        <p>Adres: {{ $familie->address }}</p>
        {{-- <p>Contributie {{ date('Y') }}: &euro; {{ $contributiebedrag }}</p> --}}
    </div>
    <div class="knop">
        <a href="/familieleden/{{ $familielid->id }}/edit">Bewerk Familielid</a>
    </div>
    <form method="POST" action="/familieleden/{{ $familielid->id }}">
        @csrf
        @method('DELETE')
        <div class="knop">
            <button>
                Delete Familielid {{ $familielid->firstname }} {{ $familie->lastname }}
            </button>
        </div>
    </form>
</x-layout>
