<x-layout>

    <h2>boekjaren</h2>
    @auth
        <div class="kaart-container">

            @unless (count($boekjaren) == 0)
                @foreach ($boekjaren as $boekjaar)
                    <div>
                        <x-boekjaar-kaart :boekjaar=$boekjaar />
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
