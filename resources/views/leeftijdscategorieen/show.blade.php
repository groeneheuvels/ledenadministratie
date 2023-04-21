<x-layout>

    <h2>Leeftijdscategorieen</h2>
    @auth
        <div class="kaart-container">

            @unless (count($leeftijdscategorieen) == 0)
                @foreach ($leeftijdscategorieen as $leeftijdscategorie)
                    <div class="kaart">
                        <p>leeftijdscategorie: {{ $leeftijdscategorie->omschrijving }}</p>
                        <p>ondergrens: {{ $leeftijdscategorie->ondergrens }}</p>
                        <p>bovengrens: {{ $leeftijdscategorie->bovengrens }}</p>
                        <p>kortingspercentage: {{ $leeftijdscategorie->kortingspercentage }}</p>

                        <div class="form-field">
                            <a class="knop" href="/leeftijdscategorieen/{{ $leeftijdscategorie->id }}/edit">Bewerk
                                leeftijdscategorie
                                {{ $leeftijdscategorie->omschrijving }}</a>
                        </div>

                        <form method="POST" action="/leeftijdscategorieen/{{ $leeftijdscategorie->id }}">
                            @csrf
                            @method('DELETE')

                            <div class="form-field">
                                <button class="danger">
                                    Delete leeftijdscategorie {{ $leeftijdscategorie->omschrijving }}
                                </button>
                            </div>

                        </form>
                    </div>
                @endforeach
            @else
                <p>Geen leeftijdscategorieen gevonden</p>
            @endunless
        </div>
        <div class="kaart-container">
            <div class="kaart">

                <a class=knop href="/leeftijdscategorieen/create">Leeftijdscategorie aanmaken</a>
            </div>
        </div>
    @endauth

</x-layout>
