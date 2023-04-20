<x-layout>
    {{--  <h2>Facturen</h2>
    @auth
        <div class="kaart-container">
            @unless (count($facturen) == 0)
                @foreach ($facturen as $factuur)
                    <div>
                        <x-factuur-kaart :factuur=$factuur />
                    </div>
                @endforeach
            @else
                <p>Geen facturen gevonden</p>
            @endunless
            <div class="knop">
                <a href="/facturen/create">factuur aanmaken</a>
            </div>
        </div>
    @endauth --}}

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
            <div class="knop">
                <a href="/facturen/create">factuur aanmaken</a>
            </div>
        </div>
    @endauth


</x-layout>
