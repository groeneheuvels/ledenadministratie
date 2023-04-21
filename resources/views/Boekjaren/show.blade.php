<x-layout>

    <h2>Boekjaren</h2>
    @auth
        <div class="kaart-container">

            @unless (count($boekjaren) == 0)
                @foreach ($boekjaren as $boekjaar)
                    <div>
                        <x-boekjaar-kaart :boekjaar=$boekjaar />
                @endforeach
            @else
                <p>Geen boekjaren gevonden</p>
            @endunless
        </div>


        <div class="kaart-container">
            <div class="kaart"><a class="knop" href="/boekjaren/create">boekjaar aanmaken</a></div>
        </div>
    @endauth

</x-layout>
