<x-layout>

    <h2>leeftijdscategorieen</h2>
    @auth
        <div class="kaart-container">

            @unless (count($leeftijdscategorieen) == 0)
                @foreach ($leeftijdscategorieen as $leeftijdscategorie)
                    <div class="kaart">
                        <p>leeftijdscategorie: {{ $leeftijdscategorie->omschrijving }}</p>
                        <p>ondergrens: {{ $leeftijdscategorie->ondergrens }}</p>
                        <p>bovengrens: {{ $leeftijdscategorie->bovengrens }}</p>
                        <p>kortingspercentage: {{ $leeftijdscategorie->kortingspercentage }}</p>
                        <div class="knop">
                            <a href="/leeftijdscategorieen/{{ $leeftijdscategorie->id }}/edit">Bewerk leeftijdscategorie
                                {{ $leeftijdscategorie->omschrijving }}</a>
                        </div>
                        <form method="POST" action="/leeftijdscategorieen/{{ $leeftijdscategorie->id }}">
                            @csrf
                            @method('DELETE')
                            <div class="knop">
                                <button>
                                    Delete leeftijdscategorie {{ $leeftijdscategorie->omschrijving }}
                                </button>
                            </div>
                        </form>
                    </div>
                @endforeach
                <div class="knop">
                    <a href="/leeftijdscategorieen/create">leeftijdscategorie aanmaken</a>
                </div>
            @else
                <p>Geen leeftijdscategorieen gevonden</p>
            @endunless
        </div>
    @endauth

</x-layout>
