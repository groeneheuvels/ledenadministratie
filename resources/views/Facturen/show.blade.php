<x-layout>


    <h2>Facturen</h2>
    @auth
        <div class="kaart-container">
            @php
                $onbetaalde_facturen = $facturen->where('betaald', '=', false)->sortBy('jaar');
                $betaalde_facturen = $facturen->where('betaald', '=', true)->sortBy('jaar');
            @endphp
            @if (count($onbetaalde_facturen) > 0)
                @foreach ($onbetaalde_facturen as $factuur)
                    <div>
                        <x-factuur-kaart :factuur=$factuur />
                    </div>
                @endforeach
            @endif
            @if (count($betaalde_facturen) > 0)
                @foreach ($betaalde_facturen as $factuur)
                    <div>
                        <x-factuur-kaart :factuur=$factuur />
                    </div>
                @endforeach
            @endif
            @if (count($facturen) == 0)
                <p>Geen facturen gevonden</p>
            @endif

        </div>

        <div class="kaart-container">
            <div class="kaart"><a class="knop"href="/facturen/create">factuur aanmaken</a></div>
        </div>

    @endauth


</x-layout>
